<?php

namespace App\Classes;

use App\Models\PermissionFunction;
use App\Models\PermissionModule;
use App\Models\PermissionPermission;

use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RecursiveRegexIterator;
use ReflectionClass;
use ReflectionMethod;
use RegexIterator;

class PermissionModuleClass {
    
    public $module;
    public $moduleType;
    public $subModules;

    public $modules;
    public $moduleId; 

    public function  __construct($module, $subModules = [])
    {
        if(!$this->getModuleInstance($module['name'])) {
            $this->setAttrs($module, $subModules);
        }
    }

    public static function find($name)
    {
        return new static(['name' => $name]);
    }

    private function setAttrs($module, $subModules = [], $modules = [], $moduleId = null)
    {
        $this->module = $module;
        $this->subModules = $subModules;
        $this->modules = $modules;
        $this->moduleId = $moduleId;
    }
    
    public function insertModule()
    {
        $this->createModules($this->module, $this->subModules, null);
        
        $this->moduleId = PermissionModule::where('name', $this->module['name'])->first()->id;

        return $this;
    }

    private function createModules($module, $subModules = [], $mainmenu)
    {
        if($module['moduleType'] == PermissionModule::MODULE) {
            $this->modules['module'][] = $module = PermissionModule::create([
                'name' => $module['name'],
                'icon' => $module['icon'] ?? null,
                'permission_module_id' => $mainmenu,  
                'permission_module_type_id' => $module['moduleType']
            ]);

            $this->insertSubModules($subModules, $module->id);

        }else {
            $this->modules['view'][] = $module = PermissionModule::create([
                'name' => $module['name'],
                'icon' => $module['icon'] ?? null,
                'permission_module_type_id' => $module['moduleType']
            ]);
        }

        return $this;
    } 

    public function insertSubModules($subModules, $moduleId = null)
    {
        if($moduleId == null) {
            $moduleId = $this->moduleId;
        }

        if(!empty($subModules)) {
            foreach($subModules as $key => $subModule) {
                if($subModule['moduleType'] == PermissionModule::VIEW) {
                    $this->modules['view'][] = $subModules = PermissionModule::create([
                        'name' => $subModule['name'], 
                        'icon' => $module['icon'] ?? null,
                        'permission_module_id' => $moduleId,
                        'permission_module_type_id' => $subModule['moduleType']
                    ]);

                }else {
                    if(isset($subModule['subModules'])) {
                        $this->createModules(
                            $subModule,
                            $subModule['subModules'],
                            $moduleId
                        );
                    }
                }
            }
        }

        return $this;
    }

    public function getArrayModules($moduleType = PermissionModule::VIEW)
    {
        return $moduleType == PermissionModule::VIEW ? $this->modules['view'] : $this->modules['module']; 
    }

    public function insertDefaultPermissions($additionalFunctions = [])
    {   
        $this->createPermissionFunctionIfNotExist($additionalFunctions);

        $modules = $this->getArrayModules();
		$functions = PermissionFunction::whereIn(
            'name', 
            array_merge(PermissionFunction::$resourcefunctionNames, $additionalFunctions)
            )->get();

        $this->insertPermissions($modules, $functions);
        
        return $this;
    }

    public function insertControllerPermissions($additionalFunctions = [])
    {
        $modules = $this->modules['view'];

        foreach($modules as $module) {
            $className = $this->transformClassName($module->name);

            $functions = $this->createPermissionFunctionIfNotExist(
                array_merge($additionalFunctions, $this->getFunctionsFromClass($className)
            ));

    		$functions = PermissionFunction::whereIn('name', $functions)->get();

            $this->insertPermissions([$module], $functions);
        }

        return $this;
    }

    public function addPermissionToModule($module, $permissions)
    {
        $this->createPermissionFunctionIfNotExist($permissions);

        $modules = collect($this->getArrayModules())->whereIn('name', $module);        
		$functions = PermissionFunction::whereIn('name', $permissions)->get();

        $this->insertPermissions($modules, $functions);

        return $this;
    }

    public function insertPermissions($modules, $functions)
    {
        foreach ($modules as $key => $module) {
            foreach ($functions as $key => $function) {
                PermissionPermission::FirstOrcreate([
                    'relation' => "{$module->name}.{$function->name}", 
                    'permission_module_id' => $module->id, 
                    'permission_function_id' => $function->id
                ]);
            }
        }
    }

    protected function getModuleInstance($name)
    {
        $module = PermissionModule::where('name', $name)->first();

        if(!$module) return false;

        $subModules = $this->getSubModules($name);

        $modules = $this->transformArrayModules($subModules);

        $this->setAttrs(
            ['name' => $name, 'moduleType' => $module->module_type_id, 'icon' => $module->icon], 
            $subModules, $modules->all(), 
            $module->id
        );

        return $this;
    }

    private function getSubModules($name)
    {
        $subModules = PermissionModule::with('allSubModules')->where('name', $name)
        ->get()
        ->pluck('allSubModules')
        ->collapse();

        return $subModules;
    }

    private function transformArrayModules($subModules)
    {
        $modules = $subModules->mapToGroups(function(PermissionModule $module, $key){
            return $module->module_type_id == PermissionModule::VIEW ? 
            ['view' => $module] : ['module' => $module];
        });

        return $modules;
    }

    public function createPermissionFunctionIfNotExist($permissions)
    {
        foreach($permissions as $permission) {
            $permissions[] = PermissionFunction::firstOrCreate(['name' => $permission]);
        }

        return $permissions;
    }

    private function getFunctionsFromClass($name)
    {
        $class = new ReflectionClass($this->getControllerInstance($name)::class);
        $methods = $class->getMethods(ReflectionMethod::IS_PUBLIC);

        foreach ($methods as $method) {
            if ($method->class == $class->getName() && $method->getName() != '__construct') {
                 $functions[] = strtolower($method->getName());
            }
        }

        return $functions;
    }

    private function transformClassName($string)
    {
        $pascalCase = str_replace('-', ' ', $string);
        $pascalCase = str_replace(' ', '', ucwords($pascalCase));

        if (substr($pascalCase, -1) === "s") {
            $pascalCase = substr($pascalCase, 0, -1);
        }

        return "{$pascalCase}Controller";
    }

    private function getControllerInstance($name) {
        $directories = new RecursiveDirectoryIterator(app_path("Http/Controllers"));
        $iterator = new RecursiveIteratorIterator($directories);
        $regex = new RegexIterator($iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);
      
        foreach ($regex as $file) {
          $fileName = basename($file[0], '.php');

          if ($name === $fileName) {
            $controllerClassName = str_replace('/', '\\', "App\\Http\\Controllers\\{$fileName}");
      
            $controller = new $controllerClassName();

            return $controller;
          }
        }
      
        throw new Exception("Controller not found: {$name}");
      }
}