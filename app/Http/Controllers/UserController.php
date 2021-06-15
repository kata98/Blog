<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Services\LogCatchs;

class UserController extends OsnovniController
{

    public $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User();
    }

    public function showLogin(){
        return view('pages.user.login', $this->data);
    }

    public function showRegister(){
        return view('pages.user.register', $this->data);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->input("email");
        $password = md5($request->input("password"));

        try {
            $user = DB::table("users")
                ->join("roles", "users.role_id", "=", "roles.id")
                ->where("email", "=", $email)
                ->where("password", "=", $password)
                ->select("users.*","roles.id as roleId")
                ->first();

            $user->IsAdmin = $user->roleId == 1;

            if ($user) {
                $request->session()->put("user", $user);
                LogCatchs::writeLogSuccess('User: ' . session('user')->first_name . ', Action: Login');
                return redirect()->route("home");
            }

            return redirect()->route("loginUser");

        } catch (\Exception $e) {
            LogCatchs::writeLog($e->getMessage(), 'Failed to login');
            return redirect()->route("loginUser");
        }
    }

    public function register(RegisterRequest $request){
        try{
            $query = $this->userModel->doRegister($request);
            if($query){
                LogCatchs::writeLogSuccess('User: ' . session('user')->first_name . ',  Action: Register');
                return redirect()->route("loginUser");
            }
        }
        catch(\PDOException $ex){
            LogCatchs::writeLog($ex->getMessage(), 'Failed to register');
            return $ex->getMessage();
        }
    }

    public function logout(Request $request) {
        LogCatchs::writeLogSuccess('User: ' . session('user')->first_name . ',  Action: Logout');
        $request->session()->remove("user");
        return redirect()->route("home");
    }

}
