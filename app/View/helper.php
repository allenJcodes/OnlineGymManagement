<?php

// checks if user contains the required role
function checkPermission($user, $roleId) {
    if ($user->user_role == $roleId) {
        return true;
    }

    return false;
}