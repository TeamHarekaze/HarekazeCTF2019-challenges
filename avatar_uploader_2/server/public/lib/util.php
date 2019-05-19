<?php
function redirect($path) {
  header('Location: ' . $path);
  exit();
}

function flash($type, $message) {
  global $session;
  $session->set('flash', [
    'type' => $type,
    'message' => $message
  ]);
  $session->save();
}

function error($message, $path = '/') {
  flash('error', $message);
  redirect($path);
}

// http://php.net/manual/en/function.base64-encode.php#121767
function urlsafe_base64_encode($data) {
  return rtrim(str_replace(['+', '/'], ['-', '_'], base64_encode($data)), '=');
}

function urlsafe_base64_decode($data) {
  return base64_decode(str_replace(['-', '_'], ['+', '/'], $data) . str_repeat('=', 3 - (3 + strlen($data)) % 4));
}