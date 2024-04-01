<?php

function checkPermission($user, $roleId) {
    if ($user->user_role == $roleId) {
        return true;
    }

    return false;
}

function checkAndCreatePublicDir($directory) {
    dd($_SERVER['DOCUMENT_ROOT']);
    if(!is_dir($_SERVER['DOCUMENT_ROOT'] . $directory)) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . $directory);
    }
}



