<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(Request $request){
        $total_users = User::count();
        $total_comments = 1;
        $total_approved_comments =2;
       $total_unapproved_comments = 2;
       return view('admin.index', compact('total_users','total_comments','total_approved_comments','total_unapproved_comments'));

   }
}
