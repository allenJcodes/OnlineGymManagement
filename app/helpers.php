<?php

function checkPermission($user, $roleId) {
    if ($user->user_role == $roleId) {
        return true;
    }

    return false;
}

function checkAndCreatePublicDir($directory) {
    if(!is_dir(public_path('/') . $directory)) {
        mkdir(public_path('/') . $directory);
    }
}



