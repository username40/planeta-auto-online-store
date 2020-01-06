<?php

namespace App\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Upload files
     *
     * @param void
     * @return array
     */
    public function upload()
    {
        $folder = request()->post('folder', 'photos');
        $path = request()->file('upload')->store("/public/$folder");
        return ['file_url' => $path];
    }

    /**
     * Upload files
     *
     * @param void
     * @return array
     */
    public function delete()
    {
        $path = request()->post('path');
        $success = false;
        if(Storage::exists($path)) {
            $success = Storage::delete($path);
        }
        return ['success' => $success];
    }
}
