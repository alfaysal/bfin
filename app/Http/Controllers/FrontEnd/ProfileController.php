<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function userDashboard()
    {
    	return view('front-end.profile.dashboard');
    }
}
