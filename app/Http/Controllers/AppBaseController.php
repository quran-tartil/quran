<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppBaseController extends Controller
{
    public function callAction($method, $parameters)
    {
        $controller = class_basename(get_class($this)); //EX: return => ProjetController
        $action = $method;  //EX: return => index
        // Remove only the last occurrence of "Controller"
        if ($controller === 'GestionControllersController') {
            $changeName = preg_replace('/Controller$/', '', $controller); // return => Controller

        } else {
            $changeName = str_replace(['Controller', '@'], ['', '-'], $controller); //EX: return => Projet
        }

        $user = Auth::user();
        $name = Auth::user()->nom;
        $hasRole_admin =  $user->hasRole(User::ADMIN);


        $permissions = $action . '-' . $changeName . 'Controller'; //EX: return => index-ProjetController
        // dd($permissions);
        // $aa =  $this->authorize($permissions);
        return parent::callAction($method, $parameters);
    }
}