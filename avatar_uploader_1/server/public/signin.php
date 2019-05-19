<?php
error_reporting(0);

require_once('config.php');
require_once('lib/util.php');
require_once('lib/session.php');

$session = new SecureClientSession(CLIENT_SESSION_ID, SECRET_KEY);

// check name is submitted
if (!isset($_POST['name']) || empty($_POST['name'])) {
  error('Name must not be empty.');
}

// check name is string
if (!is_string($_POST['name'])) {
  error('Name must be string.');
}

// check length and characters
if (!preg_match('/\A[0-9A-Z_]{4,16}\z/i', $_POST['name'])) {
  error('Name must be 4-16 characters long.');
}

// ok
$session->set('name', $_POST['name']);
flash('info', 'You have been successfully signed in!');
redirect('/');