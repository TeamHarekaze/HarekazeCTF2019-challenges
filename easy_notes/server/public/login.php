<?php
require_once('init.php');

if (!isset($_POST['user']) || empty($_POST['user'])) {
  redirect('/?page=home');
}
$user = $_POST['user'];

if (validate_user($user)) {
  set_user($user);
}

redirect('/?page=home');