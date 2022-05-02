<?php
require __DIR__ . '/autoload.php';
require 'auth.php';
$comments = Comment::findAll();
include 'template.php';
?>