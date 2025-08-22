<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
   public function login(Request $request)
{
    $incomingField = $request->validate([
        'loginemail'    => ['required', 'email'],
        'loginpassword' => ['required'],
    ]);

    // Attempt login
    if (Auth::attempt([
        'email'    => $incomingField['loginemail'],
        'password' => $incomingField['loginpassword']
    ])) {
        $request->session()->regenerate(true);

        $user = Auth::user(); // Logged in user

        // Create token (same as signup)
        $token = $user->createToken('google-login')->plainTextToken;

        // Determine redirect
        $redirectTo = match ($user->usertype) {
            'admin' => route('dashboard'),
            'user'  => route('profile'),
            default => route('home'),
        };

        // Return same view as signup
        return view('auth.google-success', [
            'token'      => $token,
            'redirectTo' => $redirectTo,
            'user'       => $user
        ]);
    }

    // If login fails
    return back()->withErrors([
        'loginemail' => 'Invalid email or password.',
    ]);
}
  public function signup(Request $request)
{
    // Validate request
    $incomingField = $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:6'],
    ]);
        $incomingField['avatar'] = 'https://sgp1.digitaloceanspaces.com/msquarefdc/uploads/images/1755852490-default-avatar.png';

    // Create the user
    $user = User::create([
        'name'     => $incomingField['name'],
        'email'    => $incomingField['email'],
        'password' => Hash::make($incomingField['password']),
        'avatar'=>$incomingField['avatar'],// hash password
    ]);

    // Create token
    $token = $user->createToken('google-login')->plainTextToken;

    // Determine redirect route
    $redirectTo = ($user->usertype === 'admin') 
        ? route('dashboard') 
        : route('profile');

    // Return blade view with token + redirect
    return view('auth.google-success', [
        'token'      => $token,
        'redirectTo' => $redirectTo,
        'user'       => $user
    ]);
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
