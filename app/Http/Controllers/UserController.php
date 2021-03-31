<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends OsnovniController
{
    public function login(){
        return view('pages.user.login', $this->data);
    }

    public function register(){
        return view('pages.user.register', $this->data);
    }

}
