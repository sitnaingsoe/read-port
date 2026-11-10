<?php

namespace App\Http\Controllers;

use App\Models\Premium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{   
    // Show the upload form
    public function showUploadForm()
    {
        $user = Auth::user();
        $userRequests = $user
            ? Premium::where('user_id', $user->id)->latest()->get()
            : collect();
        $pendingRequest = $userRequests->where('is_disabled', false)->first();

        return view("upload-form", compact('user', 'userRequests', 'pendingRequest'));
    }

    // Handle the uploaded image
    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:10240', // max 10MB
        ]);

        if ($request->hasFile('file')) {
            $filename = time() . '-' . $request->file('file')->getClientOriginalName();
            $path = 'uploads/images/' . $filename;
            $useSpaces = filled(env('AWS_ACCESS_KEY_ID')) && filled(env('AWS_BUCKET'));

            if ($useSpaces) {
                Storage::disk('spaces')->put(
                    $path,
                    fopen($request->file('file')->getRealPath(), 'r'),
                    'public'
                );
                $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');
            } else {
                Storage::disk('public')->putFileAs('uploads/images', $request->file('file'), $filename);
                $url = asset('storage/' . $path);
            }

            if (Auth::check()) {
                $user = Auth::user();
                Premium::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'e_receipt' => $url,
                    'user_id' => $user->id,
                    'is_disabled' => false,
                ]);
            }

            return back()->with('success', 'Receipt uploaded and premium request submitted successfully!')->with('url', $url);
        }

        return back()->withErrors(['file' => 'No file uploaded']);
    }
}
