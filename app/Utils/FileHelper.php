<?php

namespace App\Utils;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileHelper
{
    static public function deleteFiles(array $fileNames)
    {
        $success = true;
        foreach ($fileNames as $fileName) :
            if (Storage::exists($fileName)) $success = $success && Storage::delete($fileName);
        endforeach;
        return $success;
    }

    static public function uploadFile(Request $request, string $field, string $path)
    {
        if ($request->{$field} && $request->{$field}->isValid()) {
            $nameFile = self::createUniqueFileName($request->{$field});
            return $request->{$field}->storeAs($path, $nameFile);
        }
        return '';
    }

    static public function createUniqueFileName($file)
    {
        return $file->getClientOriginalName() . time() . '.' . $file->getClientOriginalExtension();
    }
}
