<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontEnd\Blog;
use App\Model\FrontEnd\Comment;
use App\Model\FrontEnd\CommentReply;
use App\User;
use App\Traits\BlogTrait;
use DB;

class BackEndController extends Controller
{
    use BlogTrait;

    public function index()
    {
        $blogs = DB::table('blogs')
                    ->join('users','users.id','blogs.user_id')
                    ->select('blogs.*','users.name')
                    ->where('blogs.is_published',0)
                    ->paginate(2);
        return view('back-end.home');
    }


    public function allUsers()
    {
        $users = User::all();
        return view('back-end.users.index',[
            'users' =>  $users
        ]);
    }

    
    public function blogIndex()
    {
        $blogs = DB::table('blogs')
                    ->join('users','users.id','blogs.user_id')
                    ->select('blogs.*','users.name')
                    ->where('blogs.is_published',0)
                    ->paginate(2);
        return view('back-end.blog.index',[
            'blogs' => $blogs
        ]);
    }

    public function blogBlocked(Request $request)
    {
        $blog = Blog::find($request->id);

        $blog->is_blocked = $request->is_blocked;
        $blog->save();

        return redirect()->back();
    }

    public function userBlocked(Request $request)
    {
        $user = User::find($request->id);

        $user->is_blocked = $request->is_blocked;
        $user->save();

        return redirect()->back();
    }

    public function blogDetailsBackEnd($id)
    {
        $data = $this->blogDetailsData($id);

        return view('back-end.blog.details',[
            'blog_details' => $data['blog_details'],
            'tags' => $data['tags'],
            'comments' => $data['comments'],
            'comment_replies' => $data['comment_replies'],
        ]);
    }

    public function CommentDelete($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        return redirect()->back();
    }

    public function CommentReplyDelete($id)
    {
        $comment_reply = CommentReply::find($id);

        $comment_reply->delete();

        return redirect()->back();
    }

    public function blogSearchBackend(Request $request)
    {
        $key_words =$request->keywords;

        $blogs = $this->BlogSearchData($request);
        return view('back-end.blog.result',[
            'blogs' => $blogs,
            'key_words' => $key_words,
        ]);
    }

    
}
