<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends OsnovniController
{
    public function index(){
        return view('pages.user.about', $this->data);
    }
}
