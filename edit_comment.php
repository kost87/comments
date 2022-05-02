<?php
session_start();
require __DIR__ . '/autoload.php';
$comment = Comment::findById($_POST['id']);
if ($comment->id_user == $_SESSION['user_id'])
{
    $comment->content = htmlspecialchars(stripcslashes($_POST['content']));
    $comment->save();
}
echo json_encode($comment->toArray());
?>