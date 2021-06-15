<?php

namespace App\Http\Controllers;

use App\Http\Services\LogCatchs;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends OsnovniController
{
    public $commentModel;

    public function __construct()
    {
        parent::__construct();
        $this->commentModel = new Comment();
    }

    public function insert(Request $request, $postId){
        try{
            $query = $this->commentModel->insert( $request, $postId);
            if($query){
                git
                return redirect()->back();
            }
        }
        catch(\PDOException $ex){
            LogCatchs::writeLog($ex->getMessage(), 'Failed to leave a comment');
            return $ex->getMessage();
        }
    }
}
