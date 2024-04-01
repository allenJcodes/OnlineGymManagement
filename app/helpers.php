<?php

function checkPermission($user, $roleId) {
    if ($user->user_role == $roleId) {
        return true;
    }

    return false;
}

function checkAndCreatePublicDir($directory) {
    if(!is_dir($_SERVER['DOCUMENT_ROOT'] . $directory)) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . $directory);
    }
}



