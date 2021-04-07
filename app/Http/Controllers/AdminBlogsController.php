<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class AdminBlogsController extends OsnovniController
{
    public $postModel;


    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
    }

    public function index()
    {
        $this->data["posts"] = $this->postModel->getPosts();
        return view('pages.admin.blogs', $this->data);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('blogs');
    }
}
