<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;

    public function getComments($post)
    {
        $id = $post->id;

        $query=DB::table('comments');
        $query=$query->join("users", "comments.user_id", "=", "users.id");
        $query=$query->join("posts", "comments.post_id", "=", "posts.id");
        $query=$query->where("posts.id", $id);
        $query=$query->select('comments.*', 'users.first_name as firstName', 'users.last_name as lastName', 'posts.*');

        return $query->get();
    }

    public function insert(Request $request, $postId)
    {
        $id = $postId;
        $comment = $request->input("comment");

        $query = DB::table('comments');
        $query = $query->insert(
            [
                "comment" => $comment,
                "user_id" => session()->get('user')->id,
                "post_id" => $id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")]
        );
        if ($query) {
            return true;
        }
    }

    public function getAllComments(){
        $query=DB::table('comments');
        $query=$query->join("users", "comments.user_id", "=", "users.id");
        $query=$query->join("posts", "comments.post_id", "=", "posts.id");
        $query=$query->select('comments.*', 'users.first_name as firstName', 'users.last_name as lastName', 'posts.title as postTitle');

        return $query->paginate(5);
    }
}
