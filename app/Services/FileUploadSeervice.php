<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class FileUploadSeervice
{
    /**
     * Create a new class instance.
     */
    public static function FileUpload(UploadedFile $file,string $folder="uploads") {
        return "storage/".$file->store($folder,'public');
    }
}
