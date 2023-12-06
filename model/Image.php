<?php

namespace SophieCalixto\AluraPlay\model;

class Image
{
    public static function saveImage(array $formUpload): ?string
    {
        if ($formUpload['error'] == UPLOAD_ERR_OK) {
            $filePath = $formUpload['tmp_name'];
            $image =  uniqid() . $formUpload['name'];
            $fileInfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $fileInfo->file($filePath);

            if(!str_starts_with($mimeType, 'image/')) {
                return null;
            }
            if (
                move_uploaded_file(
                    $filePath,
                    __DIR__ . '/../public/img/uploads/' . $image
                )
            ) {
                return $image;
            }

            return null;
        } else {
            return null;
        }
    }
}