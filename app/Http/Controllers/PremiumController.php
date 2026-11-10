<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Premium;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PremiumController extends Controller
{
    public function index()
    {
        $filter = request('filter', 'pending');
        $query = Premium::with('user')->latest();

        if ($filter === 'pending') {
            $query->where('is_disabled', false);
        } elseif ($filter === 'processed') {
            $query->where('is_disabled', true);
        }

        $premiums = $query->get();
        $counts = [
            'pending'   => Premium::where('is_disabled', false)->count(),
            'processed' => Premium::where('is_disabled', true)->count(),
            'all'       => Premium::count(),
        ];

        return view('admin.premium', compact('premiums', 'counts', 'filter'));
    }

    public function approve(User $user)
    {
        $user->is_premium = true;
        $user->save();

        Premium::where('user_id', $user->id)->update(['is_disabled' => true]);
        Alert::success('Approved', 'User approved as premium member.');

        return back()->with('success', 'User approved as premium.');
    }

    public function reject(Premium $premium)
    {
        $premium->is_disabled = true;
        $premium->save();

        Alert::info('Rejected', 'Premium request has been dismissed.');
        return back()->with('success', 'Premium request dismissed.');
    }
}
