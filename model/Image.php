<?php

namespace SophieCalixto\AluraPlay\model;

class Image
{
    public static function saveImage(array $formUpload): ?string
    {
        if ($formUpload['error'] == UPLOAD_ERR_OK) {
            $image =  uniqid() . $formUpload['name'];
            if (
                move_uploaded_file(
                    $formUpload['tmp_name'],
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