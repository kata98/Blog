<?php

namespace App\Models;

use App\Http\Requests\RegisterRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    protected $fillable = ["first_name", "last_name", "email", "password", 'role_id'];

    public static function validate($request){
        $request->validate([
            'first_name' =>  'required|regex:/(^([a-zA-z]+)(\d+)?$)/',
            'last_name' => 'required|regex:/(^([a-zA-z]+)(\d+)?$)/',
            'email' => 'required|email',
            'password' => 'required|regex:/[\w\W]{8,}/',
            'role_id'=>'required'
        ]);
    }

    public function doRegister(RegisterRequest $request)
    {
        $first_name = $request->input("first_name");
        $last_name = $request->input("last_name");
        $email = $request->input("email");
        $password = $request->input("password");

        $query = DB::table('users');
        $query=$query ->insert(
            ["first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "password" => md5($password),
                "role_id" => 2]
        );
        return $query;
    }

    public function getUsers($post)
    {
        $id = $post->id;

        $query=DB::table('users');
        $query=$query->join("posts", "users.id", "=", "posts.user_id");
        $query=$query->where("posts.id", $id);
        $query=$query->select('posts.*', 'users.first_name as firstName', 'users.last_name as lastName');

        return $query->get();
    }

    public function getAllUsers(){
        $query=DB::table('users');
        $query=$query->join('roles', 'roles.id', '=', 'users.role_id');
        $query=$query->select('users.*', 'roles.name as RoleName', 'roles.id as roleId');

        return $query->get();
    }

}
