<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadController extends Controller
{
    public function downloadFile($filename)
{
    $path = 'uploads/' . $filename;

    // Check if file exists
    if (!Storage::disk('spaces')->exists ($path)) {
        return back()->withErrors(['file' => 'File not found']);
    }

    // Get a temporary stream to download the file
    $stream = Storage::disk('spaces')->readStream($path);

    return response()->streamDownload(function () use ($stream) {
        fpassthru($stream);
    }, $filename);
}
}
