<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('uploadToS3')) {
    /**
     * @param $request
     * @param $folder
     * @param $files
     * @return string|void
     */
    function uploadToS3($request, $folder, $files)
    {
        if ($request->hasFile($files)) {
            $path = Storage::disk('s3')->put('images/' . $folder, $request->file($files));
            $path = Storage::disk('s3')->url($path);
            return $path;
        }
    }
}


