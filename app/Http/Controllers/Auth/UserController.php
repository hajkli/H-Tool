<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function index(){
        return 'hello UserControler';
    }
    public function list(){
        return 'Zoznam userov';
    }

    public function create(){
        return 'vytvor usera';
    }


    public function update(){
        return 'upravenie usera';
    }

    public function delete(){
        return 'vymazanie usera';
    }







    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
