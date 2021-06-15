<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends OsnovniController
{
    public $userModel;
    public $roleModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User();
        $this->roleModel = new Role();
    }

    public function index(){
        $this->data['users']=$this->userModel->getAllUsers();
        return view('pages.admin.users.users', $this->data);
    }

    public function getOneUser(User $user){
        $this->data["user"] = $user;
    }

    public function create(User $user){
        $this->data['roles']=$this->roleModel->getAll();
        $this->data["user"] = $user;
        return view ('pages.admin.users.create', $this->data);
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index');
    }


    public function store(UserRequest $request){
        try{
            $query = $this->userModel->doInsert($request);
            if($query){
                return redirect()->route("users.index");
            }
        }
        catch(\PDOException $ex){
            return $ex->getMessage();
        }
    }

    public function edit(User $user){
        $this->data['roles']=$this->roleModel->getAll();
        $this->data["user"] = $user;
        return view('pages.admin.users.edit', $this->data);
    }


    public function update(UserRequest $request, User $user){
        try
        {
            $user->update([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'email' => $request['email'],
                'password' => $request['password'],
                'role_id' => $request['role_id'],
            ]);

            DB::commit();

            return redirect()->route('users.index', $user->id)->with('success', 'User edited successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('users.edit', $user->id)->with('errorMessage', 'An error occurred!');
        }
    }
}
