<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;

class AdminPostsController extends OsnovniController
{
    public $postsModel;
    public $roleModel;

    public function __construct()
    {
        parent::__construct();
        $this->postsModel = new Post();
        $this->roleModel = new Role();
    }

    public function index(Request $request){
        $this->data['posts']=$this->postsModel->getPosts($request);
        return view('pages.admin.posts.posts', $this->data);
    }

    public function getonePost(Post $admin){
        $this->data['post'] = $admin;
    }

    public function destroy(Post $admin){
        $admin->delete();
        return redirect()->route('admin.index');
    }

    public function edit(Post $admin){
        $this->data['post']=$admin;
        return view('pages.admin.posts.editPost', $this->data);
    }

    public function update(Post $admin, Request $request){
        try
        {
            $admin->update($request->except('image'));

            if($request->has('image')){
                Post::deleteImage($admin->image);
                $newImage = Post::uploadImage($request->image);
                $admin->img = $newImage;
                $admin->save();
            }

            DB::commit();

            return redirect()->route('admin.index', $admin->id)->with('success', 'Post edited successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('admin.edit', $admin->id)->with('errorMessage', 'An error occurred!');
        }
    }

    public function create(Post $admin){
        $this->data["post"] = $admin;
        return view ('pages.admin.posts.createPost', $this->data);
    }

    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $img = $request->file('image');
        $user_id=$request->session()->get('user')->id;

        if($img->isValid()) {
            $newName = time() . $img->getClientOriginalName();
            $img->move('assets/images/', $newName);

            $admin = new Post();
            $admin->title = $title;
            $admin->description = $description;
            $admin->img = $newName;
            $admin->user_id=$user_id;
            $admin->status=1;

            $result = $admin->save();

            if($result)
                return redirect()->route('admin.index');
            else
                return redirect()->route('admin.index');

        }
        else {
            return response(['message'=> 'Data is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }

}
