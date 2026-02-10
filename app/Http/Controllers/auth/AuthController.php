<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     public function login(){
        return view("backend.auth.login");
    }
    public function register(){
        return view("backend.auth.register");
    }
    // submite Register
    public function submitRegister(Request $request){

       

        $username = $request->input("username");
        $email = $request->input("email");
        $password = $request->input("password");
        $profile = $request->file("profile");

        $path = './assets/profile';
        $image = time().'-'.$profile->getClientOriginalName();
        $profile -> move($path, $image);

        $result = DB::table('users')->insert([
            'username'=> $username,
            'email'=> $email,
            'password'=> Hash::make( $password ),
            'profile' => $image
        ]);
        if($result){
            return redirect()->route('login');
        }
    }
    // Submit Login
    public function submitLogin(Request $request){

        $username_email = $request->input('name_email');
        $password = $request->input('password');

        if(Auth::attempt(['username'=> $username_email,'password'=> $password])){
            return redirect()->route('welcome');
        }elseif(Auth::attempt(['email'=> $username_email,'password'=> $password])){
            return redirect()->route('welcome');
        }else{
            return redirect()->back()->with('message', 'field to login');
        }
    }
    // Logout
    public function logout(){
        return view('backend.auth.logout');
    }
    // Submit Logout
    public function submitLogout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

     public function profile(){
        $showProfile = DB::table('users')->get();
        return view('backend.profile', compact('showProfile'));
    }
     public function submitUpdateUser(Request $request){
         $id = $request->input('id'); // Make sure you pass user id from form

        $username = $request->input('update_username');
        $email = $request->input('update_email');
        $password = $request->input('update_password');
        $old_password = $request->input('old_password');
        $old_profile = $request->input('old_profile');

        $path = './assets/profile';
        $image = $old_profile; // Default: keep old image

        //  Check if new file uploaded
        if ($request->hasFile('update_profile')) {
            $profile = $request->file('update_profile');
            $image = time() . '-' . $profile->getClientOriginalName();
            $profile->move($path, $image);

            //  Delete old image if exists
            if (!empty($old_profile) && file_exists($path . '/' . $old_profile)) {
                unlink($path . '/' . $old_profile);
            }
        }
          // Get the current password from database
    $user = DB::table('users')->where('id', $id)->first();
         // If new password is entered, verify old password first
    if (!empty($password)) {
        if (!Hash::check($old_password, $user->password)) {
            return back()->with('error', 'Old password is incorrect.');
        }
        $hashedPassword = Hash::make($password);
    } else {
        // Keep the same password
        $hashedPassword = $user->password;
    }

        //  Update user info
        $result = DB::table('users')
            ->where('id', $id)
            ->update([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
                'profile' => $image,
                'updated_at' => now(),
            ]);

        if ($result) {
            return redirect()->route('profile')->with('success', 'Profile updated successfully!');
        } else {
            return back()->with('error', 'Update failed. Please try again.');
        }
    }
}
