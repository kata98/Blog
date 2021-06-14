<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends OsnovniController
{
    public $postModel;
    public $userModel;

    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
        $this->userModel = new User();
    }

    public function index(User $user)
    {
        $this->data["posts"] = $this->postModel->getUserPost($user);
        return view('pages.user.user-page', $this->data);
    }

    public function create()
    {
        return view('pages.posts.create', $this->data);
    }

    public function store(PostStoreRequest $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $img = $request->file('img');
        $user_id = $request->session()->get('user')->id;

        if ($img->isValid()) {
            $newName = time() . $img->getClientOriginalName();
            $img = Image::make($img->getRealPath());
            $img->resize(277, 370);
            $img->save(public_path('assets/images/'. $newName));

            $post = new Post();
            $post->title = $title;
            $post->description = $description;
            $post->img = $newName;
            $post->user_id = $user_id;
            $post->status=1;

            $result = $post->save();

            if ($result)
                return redirect()->route('home');
            else
                return redirect()->route('posts.create');

        } else {
            return response(['message' => 'Data is Invalid'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }

    public function edit(Post $post)
    {
        $this->data["post"] = $post;
        return view('pages.posts.edit', $this->data);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        try {
            $post->update($request->except('img'));

            if ($request->has('img')) {
                Post::deleteImage($post->img);
                $newImage = Post::uploadImage($request->img);
                $post->img = $newImage;
                $post->save();
            }

            DB::commit();

            return redirect()->route('home', $post->id)->with('success', 'Post edited successfully!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('posts.edit', $post->id)->with('errorMessage', 'An error occurred!');
        }
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('home')->with('success', 'Post deleted successfully!');

    }

}
