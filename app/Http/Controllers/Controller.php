<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $route;

    public function __construct()
    {
        if(request()->route()) {
            $this->route = (explode(".", request()->route()->getName()))[0];
        }
    }

    public function redirectSuccess($route, $message) 
    {
        return redirect()->route($route)->with('success', $message);
    }
    
    public function redirectError($route, $message) 
    {
        return redirect()->route($route)->with('error', $message->getMessage());
    }

    public function redirectIndex($message, $isError = false): RedirectResponse
    {
        if($isError) {
            return $this->redirectError($this->route . ".index", $message);
        }

        return $this->redirectSuccess($this->route . ".index", $message);
    }
}
