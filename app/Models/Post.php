<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "img", 'user_id', "status"];

    public static function deleteImage($img)
    {
        Storage::disk('public')->delete('assets/images/' . $img);
    }

    public static function uploadImage($img)
    {
        $path = Storage::disk('public')->putFile('assets/images', $img);
        $exploded = explode('/', $path);
        return $exploded[count($exploded) - 1];
    }

    public function getPosts()
    {
        $query = DB::table('posts');
        $query = $query->join('users', 'posts.user_id', '=', 'users.id');
        $query = $query->where('status', '=', '1');
        $query = $query->select('posts.*', 'users.first_name as firstName', 'users.last_name as lastName');


        return $query->paginate(6);
    }

    public function getAdminPosts()
    {
        $query = DB::table('posts');
        $query = $query->join('users', 'posts.user_id', '=', 'users.id');
        $query = $query->where('status', '=', '0');
        $query = $query->select('posts.*', 'users.first_name as firstName', 'users.last_name as lastName');


        return $query->paginate(6);
    }

    public function getUserPost($user)
    {

        $id = $user->id;

        $query = DB::table('posts');
        $query = $query->join("users", "posts.user_id", "=", "users.id");
        $query = $query->where("users.id", $id);
        $query = $query->select('posts.*');

        return $query->get();
    }

}
