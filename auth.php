<?php
session_start();
$user_id = 1;
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = $user_id;
}
else
{
    unset($_SESSION['user_id']);
    $_SESSION['user_id'] = $user_id;
}
$user = User::findById($_SESSION['user_id']);
?>