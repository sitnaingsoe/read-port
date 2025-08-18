<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Premium;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    public function index(){
       $premiums = Premium::with('user')->get();
        return view('admin.premium', compact('premiums'));
    }
     public function approve(User $user)
        {
            $user->is_premium = true;
            $user->save();

            return back()->with('success', 'User approved as premium.');
        }
}
