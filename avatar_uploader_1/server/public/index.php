<?php
error_reporting(0);

require_once('config.php');
require_once('lib/util.php');
require_once('lib/session.php');

$session = new SecureClientSession(CLIENT_SESSION_ID, SECRET_KEY);
if ($session->isset('flash')) {
  $flash = $session->get('flash');
  $session->unset('flash');
}
$avatar = $session->isset('avatar') ? 'uploads/' . $session->get('avatar') : 'default.png' ;
$session->save();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Avatar Uploader</title>
    <style>
/* common.css */
<?php include('common.css'); ?>
/* light/dark.css */
<?php include($session->get('theme', 'light') . '.css'); ?>
/**/
    </style>
  </head>
  <body>
    <header>
      <h1>Avatar Uploader</h1>
      <nav class="navbar">
        <ul class="mr-auto">
          <li><a href="/">Home</a></li>
          <li><a href="theme.php">Toggle theme</a></li>
<?php if ($session->isset('name')) { ?>
        </ul>
        <ul>
          <li>Hello, <?= $session->get('name'); ?>! <img src="<?= $avatar; ?>" width="24" height="24"></li>
          <li><a href="signout.php">Sign out</a></li>
<?php } ?>
        </ul>
      </nav>
    </header>
<?php if ($flash) { ?>
    <div class="<?= $flash['type'] ?>"><?= $flash['message']; ?></div>
<?php } ?>
    <main>
<?php if ($session->isset('name')) { ?>
      <h2>Upload Avatar</h2>
      <p>Please upload a PNG image less than 256kB and smaller than 256px*256px.</p>
      <form enctype="multipart/form-data" action="upload.php" method="POST">
        <p><input type="file" name="file"></p>
        <input type="submit" value="Upload">  
      </form>
<?php } else { ?>
      <h2>Sign in</h2>
      <form action="signin.php" method="POST">
        <p><label for="name">Name: </label><input type="text" name="name" id="name" pattern="^[0-9A-Za-z_]{4,16}$" placeholder="e.g. tateishi_shima"></p>
        <input type="submit" value="Sign in"> 
      </form>
<?php } ?>
    </main>
  </body>
</html>