<?php
session_start();
require __DIR__ . '/autoload.php';
$comment = new Comment (0, htmlspecialchars(stripcslashes($_POST['content'])), $_POST['id_parent'], $_SESSION['user_id']);
$comment->save();
echo json_encode($comment->toArray());
?>