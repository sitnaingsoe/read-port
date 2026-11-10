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
            $uploadedFile = $request->file('file');
            $filename = time() . '-' . preg_replace('/\s+/', '-', $uploadedFile->getClientOriginalName());
            $useR2 = filled(config('filesystems.disks.r2.key')) && filled(config('filesystems.disks.r2.bucket')) && filled(config('filesystems.disks.r2.endpoint'));

            if ($useR2) {
                $path = $uploadedFile->storeAs('uploads/images', $filename, 'r2');
                $baseUrl = config('filesystems.disks.r2.url') ?: (rtrim(config('filesystems.disks.r2.endpoint'), '/') . '/' . config('filesystems.disks.r2.bucket'));
                $url = rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
            } else {
                $path = $uploadedFile->storeAs('uploads/images', $filename, 'public');
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
