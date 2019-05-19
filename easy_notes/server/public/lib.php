<?php
function redirect($path) {
  header('Location: ' . $path);
  exit();
}

// utility functions
function e($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}

// user-related functions
function validate_user($user) {
  if (!is_string($user)) {
    return false;
  }

  return preg_match('/\A[0-9A-Z_-]{4,64}\z/i', $user);
}

function is_logged_in() {
  return isset($_SESSION['user']) && !empty($_SESSION['user']);
}

function set_user($user) {
  $_SESSION['user'] = $user;
}

function get_user() {
  return $_SESSION['user'];
}

function is_admin() {
  if (!isset($_SESSION['admin'])) {
    return false;
  }
  return $_SESSION['admin'] === true;
}

// note-related functions
function get_notes() {
  if (!isset($_SESSION['notes'])) {
    $_SESSION['notes'] = [];
  }
  return $_SESSION['notes'];
}

function add_note($title, $body) {
  $notes = get_notes();
  array_push($notes, [
    'title' => $title,
    'body' => $body,
    'id' => hash('sha256', microtime())
  ]);
  $_SESSION['notes'] = $notes;
}

function find_note($notes, $id) {
  for ($index = 0; $index < count($notes); $index++) {
    if ($notes[$index]['id'] === $id) {
      return $index;
    }
  }
  return FALSE;
}

function delete_note($id) {
  $notes = get_notes();
  $index = find_note($notes, $id);
  if ($index !== FALSE) {
    array_splice($notes, $index, 1);
  }
  $_SESSION['notes'] = $notes;
}