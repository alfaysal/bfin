<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontEnd\Tag;
use App\Model\FrontEnd\BlogTag;
use App\Model\FrontEnd\Blog;
use App\Model\Admin\Section;
use DB;

class BlogController extends Controller
{
    public function createBlog()
    {
        $tags = Tag::all();
        $sections = Section::all();
        return view('front-end.blog.create',[
            'tags'  =>  $tags,
            'sections'  =>  $sections,
        ]);
    }

    public function getImageUrl($request)
    {
         $image = request()->file('image');

        $image_name = time().$image->getClientOriginalName();
        $directory = 'front-end/stories-image/';
        $image_url = $directory.$image_name;
        $image->move($directory,$image_name);

        return $image_url;
    }

    public function saveBlog(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'section_id' => 'required',
            'image' => ['required','mimes:jpeg,bmp,png,jpg'],
            'caption' => 'required'
        ]);

        DB::transaction(function() use ($request){
            $blog = new Blog();

            $image_url = $this->getImageUrl($request);

            $blog->title = $request->title;
            $blog->section_id = $request->section_id;
            $blog->user_id = auth()->user()->id;
            $blog->body = $request->body;
            $blog->image = $image_url;
            $blog->caption = $request->caption;

            $blog->save();

            $blog_id = $blog->id;
            $this->BlogTagSave($request,$blog_id);

        });
        

        return redirect()->back()->with('blog_message','stories saved');
    }

    public function BlogTagSave($request,$blog_id)
    {
        
        foreach($request->tags as $key => $value){
            $blog_tag = new BlogTag();

            $blog_tag->blog_id = $blog_id;
            $blog_tag->tag_id = $request->tags[$key];

            $blog_tag->save();
        }
    }

    public function blogDetails($id)
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
                    ->join('users','users.id','comments.user_id')
                    ->join('comment_replies','comments.id','comment_replies.comment_id')
                    ->select('comment_replies.*','users.name')
                    ->where('comments.blog_id',$id)
                    ->get();
        $tags = DB::table('blog_tags')
                    ->join('tags','blog_tags.tag_id','tags.id')
                    ->select('tags.*')
                    ->where('blog_tags.blog_id',$id)
                    ->get();
        return view('front-end.blog.details',[
            'blog_details' => $blog_details,
            'tags' => $tags,
            'comments' => $comments,
            'comment_replies' => $comment_replies,
        ]);
    }
}
