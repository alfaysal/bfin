<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontEnd\Comment;
use App\Model\FrontEnd\CommentReply;

class CommentController extends Controller
{
     public function commentSave(Request $request){

        $commets = new Comment();

        $commets->blog_id = $request->id;
        $commets->user_id = auth()->user()->id;
        $commets->comments = $request->comments;

        $commets->save();

        return redirect()->back();
    }

    public function commentReplySave(Request $request){

        $reply = new CommentReply();

        $reply->comment_id = $request->comment_id;
        $reply->user_id = auth()->user()->id;
        $reply->reply = $request->reply;

        $reply->save();

        return redirect()->back();

    }
}
