<?php

require __DIR__ . '/../vendor/autoload.php';

use SophieCalixto\AluraPlay\model\Video;

if($_GET['id']) {
    if(Video::delete((int) $_GET['id'])){
        header("Location: /?success=1");
    } else {
        header("Location: /?success=0");
    }
}