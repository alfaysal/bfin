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

        $this->validateBlog($request);

        DB::transaction(function() use ($request){
            $blog = new Blog();

            $image_url = $this->getImageUrl($request);

            $blog->title = $request->title;
            $blog->section_id = $request->section_id;
            $blog->user_id = auth()->user()->id;
            $blog->body = $request->body;
            $blog->image = $image_url;
            $blog->caption = $request->caption;
            $blog->is_published = $request->is_published;

            $blog->save();

            $blog_id = $blog->id;
            $this->BlogTagSave($request,$blog_id);

        });
        

        return redirect()->back()->with('blog_message','stories saved');
    }

    public function validateBlog($request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'section_id' => 'required',
            'image' => ['required','mimes:jpeg,bmp,png,jpg'],
            'caption' => 'required'
        ]);
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
        return view('front-end.blog.details',[
            'blog_details' => $blog_details,
            'tags' => $tags,
            'comments' => $comments,
            'comment_replies' => $comment_replies,
        ]);
    }

    public function TagCategorized($id)
    {
        $tag = Tag::find($id);
        $key_words = $tag->name;
        $blogs = DB::table('blog_tags')
                    ->join('blogs','blog_tags.blog_id','blogs.id')
                    ->select('blogs.*')
                    ->where('blog_tags.tag_id',$id)
                    ->get();
        
        return $this->viewFileForResult($blogs,$key_words);
    }

    public function viewFileForResult($blogs,$key_words)
    {
       return view('front-end.blog.result',[
            'blogs' =>  $blogs,
            'key_words' =>  $key_words,
        ]);
    }

    public function SectionCategorized($id)
    {
        $section = Section::find($id);
        $key_words = $section->name;
        // ********* One to Many Relation in Model*******
        $blogs = Section::find($id)->blogs()->get();
        
        return $this->viewFileForResult($blogs,$key_words);
    }

    public function BlogSearch(Request $request)
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

        return $this->viewFileForResult($blogs,$key_words);

    }

    public function editBlog($id)
    {
        $blog = Blog::find($id);
        $sections = Section::all();
        $tags = Tag::all();
        $blog_tags = DB::table('blog_tags')
                    ->join('tags','blog_tags.tag_id','tags.id')
                    ->select('tags.*')
                    ->where('blog_tags.blog_id',$id)
                    ->get();

        return view('front-end.blog.edit_blog',[
            'blog'  =>  $blog,
            'tags'  =>  $tags,
            'blog_tags'  =>  $blog_tags,
            'sections'  =>  $sections,
        ]);
    }


    public function updateBlog(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'section_id' => 'required',
            'image' => ['mimes:jpeg,bmp,png,jpg'],
            'caption' => 'required'
        ]);

        DB::transaction(function() use ($request){
            $blog = Blog::find($request->id);

            $image = request()->file('image');

            if($image){
              unlink(public_path($request->old_image));
             $image_url = $this->getImageUrl($request);
            }else{
                 $image_url = $request->old_image;
            }

            $blog->title = $request->title;
            $blog->section_id = $request->section_id;
            $blog->user_id = $request->user_id;
            $blog->body = $request->body;
            $blog->image = $image_url;
            $blog->caption = $request->caption;
            $blog->is_published = $request->is_published;

            $blog->save();

            $blog_tags = BlogTag::where('blog_id',$request->id)->get();
            
            foreach($blog_tags as $blog_tag){
                $tag = BlogTag::find($blog_tag->id);

                $tag->delete();
            }

            $this->BlogTagSave($request,$request->id);

        });

        return redirect()->back()->with('edit_blog','Blog Updated Successfully');


    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $blog->delete();

        return redirect()->back()->with('delete_blog','Blog Deleted');

    }


}
