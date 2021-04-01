<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends OsnovniController
{
    public $postModel;

    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
    }

    public function index(){
        $this->data['posts']=$this->postModel->getPosts();
        return view('pages.home', $this->data);
    }

    public function show(Post $post){
        $this->data["post"] = $post;
        return view('pages.posts.single-post', $this->data);
    }
}
