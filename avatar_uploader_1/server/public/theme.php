<?php
error_reporting(0);

require_once('config.php');
require_once('lib/util.php');
require_once('lib/session.php');

$session = new SecureClientSession(CLIENT_SESSION_ID, SECRET_KEY);
$newTheme = ($session->get('theme', 'light') === 'light') ? 'dark' : 'light';
$session->set('theme', $newTheme);
flash('info', 'Your theme has been successfully updated!');
redirect('/');