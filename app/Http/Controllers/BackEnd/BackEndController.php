<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontEnd\Blog;
use App\Model\FrontEnd\Comment;
use App\Model\FrontEnd\CommentReply;
use App\User;

use DB;

class BackEndController extends Controller
{
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
         $blog_details = DB::table('blogs')
                            ->join('users','users.id','blogs.user_id')
                            ->select('blogs.*','users.name')
                            ->where('blogs.id',$id)
                            ->get();
        $comments = DB::table('users')
                    ->join('comments','users.id','comments.user_id')
                    ->select('comments.*','users.name')
                    ->where('comments.blog_id',$id)
                    ->get();
        $comment_replies= DB::table('comments')
                    ->join('comment_replies','comments.id','comment_replies.comment_id')
                    ->join('users','users.id','comment_replies.user_id')
                    ->select('comment_replies.*','users.name')
                    ->where('comments.blog_id',$id)
                    ->get();
        $tags = DB::table('blog_tags')
                    ->join('tags','blog_tags.tag_id','tags.id')
                    ->select('tags.*')
                    ->where('blog_tags.blog_id',$id)
                    ->get();
        return view('back-end.blog.details',[
            'blog_details' => $blog_details,
            'tags' => $tags,
            'comments' => $comments,
            'comment_replies' => $comment_replies,
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

        $blogs = DB::table('blogs')
                    ->join('blog_tags','blog_tags.blog_id','blogs.id')
                    ->join('sections','sections.id','blogs.section_id')
                    ->join('tags','tags.id','blog_tags.tag_id')
                    ->select('blogs.*')
                    ->where('tags.name',"like", "%" . $request->keywords . "%")
                    ->orWhere('sections.name',"like", "%" . $request->keywords . "%")
                    ->orWhere('blogs.title',"like", "%" . $request->keywords . "%")
                    ->orWhere('blogs.body',"like", "%" . $request->keywords . "%")
                    ->groupBy('blogs.id')
                    ->get();
        return view('back-end.blog.result',[
            'blogs' => $blogs,
            'key_words' => $key_words,
        ]);
    }
}
