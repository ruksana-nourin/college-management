<?php

namespace App\Services;

class UploadImages
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function upload(
        $img_file,
        $path = 'uploads',
        $img_name = null
    ) {
        if (!is_dir(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }

        if ($img_name != null) {
            $img_name = $img_name . '.' .
                $img_file->getClientOriginalExtension();
        } else {
            $img_name = time() . '.' .
                $img_file->getClientOriginalExtension();
        }

        $img_file->move(
            public_path($path),
            // public_path('../../college-management.nourin.xyz/uploads/students/' . $path),

            $img_name
        );

        return $path . '/' . $img_name;
    }
}
