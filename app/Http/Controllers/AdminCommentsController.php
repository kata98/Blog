<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentsController extends OsnovniController
{
    public $commentModel;

    public function __construct()
    {
        parent::__construct();
        $this->commentModel = new Comment();
    }

    public function index(){
        $this->data['comments']=$this->commentModel->getAllComments();
        return view('pages.admin.comments.comments', $this->data);
    }

    public function getOneComment(Comment $comment){
        $this->data['comment']=$comment;
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('comments.index');
    }
}
