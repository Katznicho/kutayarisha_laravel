<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('password', 'email');

                //valid credential

                $validator = Validator::make($credentials, [
                    'password' => 'required',
                    'email' => 'required|email',
                ]);

                //return back with error message if validation fails
                if ($validator->fails()) {
                    return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
                }

                //attempt to login user
                if (Auth::attempt($credentials)) {
                    //if successful, redirect to their intended location
                    $names = Auth::user()->name;
                     $request->session()->put('names', $names);
                    return redirect()
                    ->route('admin')
                    ->with(
                        'success',
                        " Welcome Back {$names} "
                    );

                }
                else{
                    //if not, redirect back to login with the form data
                    return redirect()->back()->with('status', 'Invalid Credentials');
                }
    }
    public function logout(Request $request)
    {

        $request->session()->invalidate();
        Auth::logout();

        return redirect()->route('welcome');
    }
    public function register(Request $request)
    {
        return view('auth.register');
    }
    public function registerUser(Request $request)
    {
        $credentials = $request->only('password', 'email', 'name', 'password_confirmation');
        

        //valid credential

        $validator = Validator::make($credentials, [
            'password' => 'required | min:5 | confirmed',
            'email' => 'required|email | unique:users',
            'name' => 'required',

        ]);
        //return back with error message if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
         
        //create a user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2,
            'phone' => $request->phone,

            
        ]);
        //if successful, redirect to their intended location
        if ($user) {
            return redirect()
                ->route('login')
                ->with(
                    'success',
                    " {$request->name} Registered Successfully"
                );
        }
        //if not, redirect back to login with the form data
        else {
             dd('error');
            return redirect()->back()->with('status', 'Invalid Credentials');
        }

      
        
    }

    //confirming email
    public function  confirm($emailEncrpyted)
    {
        try {
            $decrypted = Crypt::decryptString($emailEncrpyted);
            //dd($decrypted);
            $number =  explode('_', $decrypted)[1];
            $email =   explode('_', $decrypted)[0];

            //dd($email);
            //here
            //dd(Crypt::encryptString($number));
            if (!User::where('email', $email)->exists()) {
                return view('auth.login');
            }
            $checkForgotToken  = User::where('email', $email)->get()->pluck('setPasswordToken')[0];
            if ($checkForgotToken == NULL) {
                return view('auth.login');
            }

            if (Crypt::decryptString($checkForgotToken) == $number) {
                $updateEmail = User::where('email', $email)->update(['email_verified_at' => Carbon::now()]);
                //dd($updateEmail);
                //finish
                if ($updateEmail) {
                    //dd('here updated');

                    $email = $emailEncrpyted;
                    return view('auth.setpassword', compact('email'));
                } else {

                    return view('auth.login');
                }
                //finish
            } else {
                return view('auth.login');
            }





            //here
        } catch (DecryptException $e) {
            //
            return view('auth.login');
        }
    }
}
