<?php

require __DIR__ . '/../vendor/autoload.php';

use SophieCalixto\AluraPlay\model\Image;
use SophieCalixto\AluraPlay\model\Video;

if ($_POST['title'] && $_POST['url']) {
    if (
        Video::add($_POST['url'], $_POST['title'], Image::saveImage($_FILES['image']))
    ) {
        header('Location: /?success=1');
    } else {
        header('Location: /?success=0');
    }
}