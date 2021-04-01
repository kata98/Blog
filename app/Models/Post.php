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

    public function getPosts(){
        $query=DB::table('posts');
        $query=$query->join('users', 'posts.user_id', '=', 'users.id');
        $query=$query->select('posts.*', 'users.first_name as firstName', 'users.last_name as lastName');

//        if($request->has("keyword")){
//            $query=$query->where("posts.title","like","%". $request->get("keyword") ."%");
//        }

        return $query->paginate(6);
    }
}
