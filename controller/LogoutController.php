<?php

if($_SESSION['logged']) {
    $_SESSION['logged'] = false;
}

header('Location: /login');