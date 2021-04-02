<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class HomeController extends OsnovniController
{
    public $postModel;
    public $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
        $this->userModel = new User();
    }

    public function index(){
        $this->data['posts']=$this->postModel->getPosts();
        return view('pages.home', $this->data);
    }

    public function show(Post $post){
        $this->data["post"] = $post;
        $this->data["users"] = $this->userModel->getUsers($post);
        return view('pages.posts.single-post', $this->data);
    }
}
