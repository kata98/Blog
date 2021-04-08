<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home');
    }

    public function show()
    {
        $this->data["posts"] = $this->postModel->getAdminPosts();
        return view('pages.admin.pending-blogs', $this->data);
    }

    public function update(Post $post)
    {
        try {

            $post->status = 1;
            $post->save();

            return redirect()->route('home', $post->id)->with('success', 'Post edited successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.pending-blogs', $post->id)->with('errorMessage', 'An error occurred!');
        }
    }
}
