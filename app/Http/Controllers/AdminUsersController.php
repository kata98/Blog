<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminUsersController extends OsnovniController
{
    public $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User();
    }

    public function index(){
        $this->data['users']=$this->userModel->getAllUsers();
        return view('pages.admin.users', $this->data);
    }

}
