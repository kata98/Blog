<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends OsnovniController
{
    public $postModel;
    public $userModel;
    public $commentModel;

    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
        $this->userModel = new User();
        $this->commentModel = new Comment();
    }

    public function index(Request $request){
        $this->data['posts']=$this->postModel->getPosts($request);
        return view('pages.home', $this->data);
    }

    public function show(Post $post){
        $this->data["post"] = $post;
        $this->data["users"] = $this->userModel->getUsers($post);
        $this->data["comments"] = $this->commentModel->getComments($post);
        return view('pages.posts.single-post', $this->data);
    }
}
