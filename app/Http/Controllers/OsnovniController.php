<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OsnovniController extends Controller

{
    public $data;

    public function __construct()
    {
        $this->data["menu"] = [
            [
                "name" => "Home",
                "route" => "home"
            ],
            [
                "name" => "Login",
                "route" => "login"
            ],
            [
                "name" => "Register",
                "route" => "register"
            ]
        ];
    }
}
