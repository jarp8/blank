<?php

namespace App\Classes;

use App\Models\MenuMainMenu;
use App\Models\MenuViewname;
use App\Models\PermissionModule;
use App\Classes\PermissionModuleClass;

class MainMenuClass {

    public $permissionsArray;
    public $menuPosition = 0;

	public function insertMenu()
	{
		$this->createMenus($this->getStructure());
	}

    public function createMenus($menus)
	{
		foreach ($menus as $key => $value) {
			$this->createMenu($value);
		}
	}

	public function getModules()
	{
		$modules = PermissionModule::whereNull('permission_module_id')
		->whereIn('permission_module_type_id', [PermissionModule::MODULE, PermissionModule::VIEW])->get();

		foreach($modules as $module) {
			$permissionModules[] = PermissionModuleClass::find($module->name);
		}

		return $permissionModules;
	}

	public function getStructure()
	{
		$instances = $this->getModules();
		$menu = [];

		foreach ($instances as $instance) {
			$modules = [
				'name' => $instance->module['name'],
				'icon' => $instance->module['icon'] ?? null
			];

			$submenu = $this->getSubmenuStructure($instance->subModules);
			
			if (!empty($submenu)) {
				$modules['submenu'] = $submenu;
			}

			$menu[] = $modules;
		}

		return $menu;
	}

	private function getSubmenuStructure($subModules, $main = null)
	{
		$submenu = [];

		foreach ($subModules as $key => $subModule) {
			$key2 = $main ?? $key;

			$submenuItem = [
				'name' => $subModule->name,
				'icon' => $subModule->icon ?? null
			];

			if ($subModule->allSubModules->isNotEmpty()) {
				$submenuItem['submenu'] = $this->getSubmenuStructure($subModule->allSubModules, $key2);
			}

			$submenu[] = $submenuItem;
		}

		return $submenu;
	}


	private function createMenu($param, $menuPosition = null, $menu_id = null)
	{
		//Set menu position as incremental value
		if($menuPosition == null) {
			$this->menuPosition += 10;
		}

		//If the param array doesn't have items then we search the viewname 
		//to link with the menu we will create
		if(!isset($param['submenu'])) {
			$viewname = MenuViewname::where("name", $param["viewname"] ?? $param["name"])->first();
		}
		
		//Create the menu
		$menu = MenuMainMenu::create([
			"text" => $param["name"], 
			"icon" => $param["icon"] ?? null,
			"menu_position" => $menuPosition ?? $this->menuPosition, 
			// "mainmenu_status_id" => MainmenuStatus::ACTIVE,
			"menu_viewname_id" => !isset($param["submenu"]) ? $viewname->id : null,
			"menu_main_menu_id" => $menu_id ?? null,
		]);

		//If the menu have submenus
		$position = 0;
		foreach ($param["submenu"] ?? [] as $key => $value) {
			$position++;
			$submenuPosition = (floatval($this->menuPosition) * 10) + ($position * 10);
			$this->createMenu($value, $submenuPosition, $menu->id);
		}
	}

    public function getMenus()
    {
        $menus = MenuMainMenu::with([
            'viewname.permission.permissionFunction',
            'viewname.permission.permissionModule'
            ])
            ->orderBy("menu_position", "ASC")
            ->get()->toArray();

        $this->permissionsArray = auth()->user()->getAllPermissionsArray();
        $result = $this->getSubmenus($menus, null);

        return $result;
    }

    public function getSubmenus(&$menus, $mainmenu_id)
    {
        $result = [];

        foreach ($menus as $key => &$menu) {

            if ($menu["menu_main_menu_id"] == $mainmenu_id) {
                unset($menus[$key]);

                if ($menu["menu_viewname_id"] != null) {
                    $permissionId = $menu["viewname"]["permission_permission_id"] ?? null;

                    if ($permissionId !== null && isset($this->permissionsArray[$permissionId])) {

                        $module = $menu["viewname"]["permission"]["permission_module"];
                        $function = $menu["viewname"]["permission"]["permission_function"];

                        $menu["url"] = route(strtolower($module["name"] . "." . $function["name"]));

                        $result[] = $menu;
                    }
                } else {
                    $submenus = $this->getSubmenus($menus, $menu["id"]);

                    if (!empty($submenus)) {
                        $submenu = [
                            "url" => "submenu" . ucfirst($menu["text"]),
                            "submenu" => $submenus
                        ];

                        if ($this->hasVisibleSubmenu($submenu)) {
                            $menu["submenu"] = $submenus;
                            $result[] = $menu;
                        }
                    }
                }
            }
        }

        return $result;
    }

    protected function hasVisibleSubmenu(array $submenu)
    {
        foreach ($submenu["submenu"] as $sub) {
            if (isset($sub["viewname"]["permission_permission_id"]) && isset($this->permissionsArray[$sub["viewname"]["permission_permission_id"]])) {
                return true;
            }
        }

        return false;
    }
}