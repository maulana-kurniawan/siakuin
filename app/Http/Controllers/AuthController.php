<?php

namespace App\Http\Controllers;

use App\FirebaseAuthenticationService;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    protected $firebaseAuth;

    public function __construct(FirebaseAuthenticationService $firebaseAuth)
    {
        $this->firebaseAuth = $firebaseAuth;
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $this->firebaseAuth->loginUser($email, $password);
            Auth::attempt(['email' => $email, 'password' => $password]);

            return redirect()->intended('/');
        } catch (\Exception $e) {
            return back()->with('alert', 'Email atau Password Salah !');
        }
    }

    public function register(Request $request)
    {

        $messages = [
            'required' => ':attribute wajib diisi cuy!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya cuy!!!',
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ], $messages);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');


        $uid = $this->firebaseAuth->registerUser($email, $password);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->firebase_uid = $uid;
        $user->save();

        Auth::login($user);

        return redirect()->intended('/');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        // $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->company_name = $request->input('company_name');
        $user->location = $request->input('location');
        $user->update();

        return redirect()->back()->with('status', 'User Updated Successfully');
    }

    public function updateProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image',
        ]);
  
        $avatarName = time().'.'.$request->profile_image->getClientOriginalExtension();
        $request->profile_image->move(public_path('avatars'), $avatarName);
  
        Auth()->user()->update(['profile_image'=>$avatarName]);
  
        return back()->with('success', 'Avatar updated successfully.');
    }


    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
