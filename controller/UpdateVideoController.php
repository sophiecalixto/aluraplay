<?php

require __DIR__ . '/../vendor/autoload.php';

use SophieCalixto\AluraPlay\model\Image;
use SophieCalixto\AluraPlay\model\Video;

if($_POST['id'] && $_POST['title'] && $_POST['url']) {
    if(Video::update((int) $_POST['id'], $_POST['title'], $_POST['url'], Image::saveImage($_FILES['image']))) {
        header('Location: /?success=1');
    } else {
        header('Location: /?success=0');
    }
}