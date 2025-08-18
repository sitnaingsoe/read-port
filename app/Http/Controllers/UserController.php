<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{   
public function approve(User $user, Premium $premium)
{
    // Approve the user
    $user->is_premium = true;
    $user->save();

    // Optional: disable all their pending premium requests
    Premium::where('user_id', $user->id)
        ->update(['is_disabled' => true]);

    Alert::success("Success", "User approved as premium.");
    return back()->with('success', 'User approved as premium.');
}

    public function logout(){
        Auth::logout();
        return redirect("/");
    }
    public function login(Request $request){
        $incomingFiled = $request->validate([
    'loginemail' => ["required", 'email'],
    'loginpassword' => 'required'
]);

if (Auth::attempt([
    'email' => $incomingFiled['loginemail'],
    'password' => $incomingFiled['loginpassword']
])) {

    $request->session()->regenerate(true);

    $user = Auth::user(); // Logged in user

    switch ($user->usertype) {
        case 'admin':
            return redirect()->route('dashboard');
        case 'user':
            return redirect()->route('profile');
        default:
            return redirect()->route('home');
    }
}

// If login fails
return back()->withErrors([
    'loginemail' => 'Invalid email or password.',
]);

    }
    public function signup(Request $request)
    {
        $incomingField = $request->validate([
            'name'     => 'required',
            'email'    => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        User::create($incomingField);
       
        // Trigger the SweetAlert
        Alert::success('Success!', 'Your account has been created.');
         $user = User::create($incomingField);

        // Redirect to home
             if ($user->usertype === 'admin') {
                    return redirect()->route('dashboard');
            } else {
                    return redirect()->route('profile');
                }
    }
    public function loginView()
    {
        return view('auth.login');
    }

    public function signupView()
    {
        return view('auth.signup');
    }
}
