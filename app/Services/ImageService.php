<?php
namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageService
{

    public function __construct()
    {
        $this->defaultImage = config('constants.default_profile_image');
    }

    public function generateFilePath($image): string
    {
        $customName = "crud_" . Str::uuid();
        $extension  = $image->getClientOriginalExtension();
        $fileName   = $customName . '.' . $extension;
        $path       = $image->storeAs('/', $fileName, 'custom');
        $fullPath   = '/uploads/' . $path;

        return $fullPath;
    }

    public function deleteFromStorage($image = null)
    {
        if ($image !== $this->defaultImage) {
            $path = public_path($image);

            if (File::exists($path)) {
                File::delete(public_path($$path));
            }

        }

    }
}
