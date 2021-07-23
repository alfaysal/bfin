<?php 

namespace App\Traits;
use Illuminate\Http\Request;

use DB;

trait BlogTrait
{
    protected function blogDetailsData($id)
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

        return ['blog_details' => $blog_details,'comments' => $comments,'comment_replies' => $comment_replies,'tags' => $tags];
    }

	protected function BlogSearchData($request)
    {
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
        return $blogs;
    }

}





?>