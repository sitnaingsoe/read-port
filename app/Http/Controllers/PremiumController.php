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
        public function premiumRequest(Request $request){
                $request->validate([
                    'user_id' => 'required|exists:users,id',
                    'name' => 'required|string|max:255',
                    'email' => 'required|email',
                    'e_receipt' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
                ]);

                // store file
                $path = $request->file('e_receipt')->store('receipts', 'public');

                // save in premiums table
                Premium::create([
                    'user_id' => $request->user_id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'e_receipt' => $path,
                ]);

                return redirect()->back()->with('success', 'Your upgrade request has been submitted!');
        }
}
