<?php
error_reporting(0);

require_once('config.php');
require_once('lib/util.php');
require_once('lib/session.php');

$session = new SecureClientSession(CLIENT_SESSION_ID, SECRET_KEY);
$session->unset('avatar');
$session->unset('name');
flash('info', 'You have been successfully signed out!');
redirect('/');