<?php
require_once('init.php');

if (!isset($_GET['page']) || empty($_GET['page'])) {
  $page = 'home';
} else {
  $page = $_GET['page'];
}

if (in_array($page, ['notes', 'note', 'add', 'delete'], true) && !is_logged_in()) {
  redirect('/?page=home');
}

if (in_array($page, ['home', 'flag', 'notes', 'note', 'add', 'delete', 'login'], true)) {
  include('includes/header.php');
  include('pages/' . $page . '.php');
  include('includes/footer.php');
} else {
  redirect('/?page=home');
}
?>