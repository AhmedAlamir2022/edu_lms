<?php

namespace App\Traits;

use Exception;
use Illuminate\Http\UploadedFile;
use File;

trait FileUpload
{

    public function uploadFile(UploadedFile $file, string $directory = 'uploads'): string
    {
        $filename = 'educore_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // تحديد المسار داخل مجلد public
        $path = public_path($directory);

        // إنشاء المجلد إذا لم يكن موجودًا
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // نقل الملف
        $file->move($path, $filename);

        // إرجاع المسار الظاهر للمتصفح
        return '/' . $directory . '/' . $filename;
    }

    public function deleteFile(?string $path): bool
    {
        if ($path && File::exists(public_path($path))) {
            File::delete(public_path($path));
            return true;
        }

        return false;
    }
}
