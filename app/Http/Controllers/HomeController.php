<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends OsnovniController
{
    public function index(){
        return view('pages.home', $this->data);
    }
}
