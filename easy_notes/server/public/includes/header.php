<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Easy Notes</title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Easy Notes</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
            <?php if (is_logged_in()) { ?>
            <li class="nav-item"><a class="nav-link" href="?page=notes">View notes</a></li>
            <li class="nav-item"><a class="nav-link" href="?page=add">Add note</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="exportDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" >Export notes</a>
              <div class="dropdown-menu" aria-labelledby="exportDropdown">
                <a class="dropdown-item" href="export.php?type=zip">Export as .zip</a>
                <a class="dropdown-item" href="export.php?type=tar">Export as .tar</a>
              </div>
            </li>
            <?php } ?>
            <li class="nav-item"><a class="nav-link<?php if (!is_admin()) { ?> disabled<?php } ?>" href="?page=flag">Get flag</a></li>
          </ul>
          <ul class="navbar-nav">
            <?php if (is_logged_in()) { ?>
            <li class="nav-item navbar-text">Hello, <?= get_user(); ?>!</li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
            <?php } else { ?>
            <li class="nav-item"><a class="nav-link" href="?page=login">Log in</a></li>
            <?php }; ?>
          </ul>
        </div>
      </nav>
    </div>
    <main class="container">
