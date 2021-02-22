<?php

namespace App\Utils;
use Illuminate\Http\Request;

class FileHelper {

    static public function uploadFile(Request $request, string $field, string $path) {
        if ($request->{$field} && $request->{$field}->isValid()) {
            $nameFile = self::createUniqueFileName($request->{$field});
            return $request->{$field}->storeAs($path, $nameFile);
        }
        return '';
    }

    static public function createUniqueFileName($file) {
        return $file->getClientOriginalName() . time() .'.'.$file->getClientOriginalExtension();
    }
}