<?php
require_once('init.php');

if (!is_logged_in()) {
  redirect('/?page=home');
}

$notes = get_notes();

if (!isset($_GET['id']) || empty($_GET['id'])) {
  redirect('/?page=notes');
}
$id = $_GET['id'];

delete_note($id);

redirect('/?page=notes');
?>