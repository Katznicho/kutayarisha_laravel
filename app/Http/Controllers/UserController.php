<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\RoleModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $roles = User::select('*');

            //dd($roles);

            return DataTables::of($roles)

                ->addColumn('action', function ($row) {

                    $id = $row->id;
                    //   ';
                    return view('user.actions', compact('id'))->render();
                })

                ->make(true);
        }

        return view('user.index');
    }

    public function create()
    {

        return view('user.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        $details =
        [
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>Hash::make($request->password)
        ];
        User::create($details);
        return redirect()->route('users.index')
        ->with('success', "{$request->name} created successfully");


    }
}
