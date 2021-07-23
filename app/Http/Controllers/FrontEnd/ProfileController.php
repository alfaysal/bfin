<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\FrontEnd\Blog;
use App\User;


class ProfileController extends Controller
{
    public function userDashboard()
    {
        $user = User::find(auth()->user()->id);

    	return view('front-end.profile.dashboard',[
            'user'  =>  $user
        ]);
    }

    public function MyBlogs()
    {
        $blogs = Blog::where('user_id',auth()->user()->id)->get();

        return view('front-end.profile.my_blogs',[
            'blogs' => $blogs
        ]);
    }

    public function editUserInfo($id)
    {
        $user = User::find($id);

        return view('front-end.profile.edit',[
            'user'  =>  $user
        ]);
    }


    public function updateUserInfo(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'gender' => 'required',
            'image' => ['mimes:jpeg,bmp,png,jpg'],
            'phone' => 'required','string'
        ]);

        $image = request()->file('image');

        if($image){
           $image_name = time().$image->getClientOriginalName();
            $directory = 'front-end/user-image/';
            $image_url = $directory.$image_name;
            $image->move($directory,$image_name); 
        }else{
            $image_url = $request->old_image;
        }

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->image = $image_url;

        $user->save();

        return redirect()->back()->with('edit_pro_message','Change Profile');
    }
}
