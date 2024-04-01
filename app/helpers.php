<?php

function checkPermission($user, $roleId) {
    if ($user->user_role == $roleId) {
        return true;
    }

    return false;
}

function checkAndCreatePublicDir($directory) {
    dd(public_path('/'));
    if(!is_dir($_SERVER['DOCUMENT_ROOT'] . $directory)) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . $directory);
    }
}



