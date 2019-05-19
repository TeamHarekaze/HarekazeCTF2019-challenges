<?php
require_once('init.php');

if (!is_logged_in()) {
  redirect('/?page=home');
}

if (!isset($_POST['title']) || empty($_POST['title'])) {
  redirect('/?page=notes');
}
$title = $_POST['title'];

if (!isset($_POST['body']) || empty($_POST['body'])) {
  redirect('/?page=notes');
}
$body = $_POST['body'];

add_note($title, $body);
redirect('/?page=notes');