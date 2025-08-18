<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFileController extends Controller
{   
    // Show the upload form
    public function showUploadForm()
    {
        return view("upload-form");
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

            Storage::disk('spaces')->put(
                $path,
                fopen($request->file('file')->getRealPath(), 'r'),
                'public'
            );

            $url = rtrim(env('AWS_ENDPOINT'), '/') . '/' . env('AWS_BUCKET') . '/' . ltrim($path, '/');

            return back()->with('success', 'Image uploaded successfully!')->with('url', $url);
        }

        return back()->withErrors(['file' => 'No file uploaded']);
    }
}
