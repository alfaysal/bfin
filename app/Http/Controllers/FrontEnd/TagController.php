<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontEnd\Tag;

class TagController extends Controller
{
     public function index()
    {
        return view('front-end.profile.tag');
    }

    public function tagSave(Request $request)
    {
        $tag = new Tag();

        $validated = $request->validate([
            'name' => 'required|unique:tags|max:255|min:3',
        ]);
        
        $this->SaveTagInfo($tag,$request);

        return redirect()->back()->with('tag_message','Tag added successfully');
    }

    public function SaveTagInfo($tag,$request)
    {
        $tag->name = $request->name;
        $tag->save();
    }

   
    public function tagEdit(Request $request)
    {
        $tag = tag::find($request->id);

        return $tag;

    }

    public function tagUpdate(Request $request)
    {
        $tag = tag::find($request->id);

        $this->SavetagInfo($tag,$request);

        return response()->json(['success'  =>  True]);

    }

    public function tagDelete(Request $request)
    {
        $tag = tag::find($request->id);

        $tag->delete();

        return response()->json(['success'  =>  True]);
        
    }
}
