<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function index(Request $request){
        //get the current logged in user details
        $user = Auth::user();
         $total_users = User::count();

         $total_comments = 1;
         $total_approved_comments =2;
        $total_unapproved_comments = 2;
        return view('admin.index', compact('total_users','total_comments','total_approved_comments','total_unapproved_comments', 'user'));

    }
}
