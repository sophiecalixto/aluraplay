<?php

require __DIR__ . '/../vendor/autoload.php';

use SophieCalixto\AluraPlay\model\Video;

if ($_POST['title'] && $_POST['url']) {
    if (
        Video::Add($_POST['url'], $_POST['title'])
    ) {
        header('Location: /?success=1');
    } else {
        header('Location: /?success=0');
    }
}