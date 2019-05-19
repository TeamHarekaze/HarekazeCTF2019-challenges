<?php
class SecureClientSession {
  private $cookieName;
  private $secret;
  private $data;

  public function __construct($cookieName = 'session', $secret = 'secret') {
    $this->data = [];
    $this->secret = $secret;

    if (array_key_exists($cookieName, $_COOKIE)) {
      try {
        list($data, $signature) = explode('.', $_COOKIE[$cookieName]);
        $data = urlsafe_base64_decode($data);
        $signature = urlsafe_base64_decode($signature);
    
        if ($this->verify($data, $signature)) {
          $this->data = json_decode($data, true);
        }
      } catch (Exception $e) {}
    }
  
    $this->cookieName = $cookieName;
  }

  public function isset($key) {
    return array_key_exists($key, $this->data);
  }

  public function get($key, $defaultValue = null){
    if (!$this->isset($key)) {
      return $defaultValue;
    }

    return $this->data[$key];
  }

  public function set($key, $value){
    $this->data[$key] = $value;
  }

  public function unset($key) {
    unset($this->data[$key]);
  }

  public function save() {
    $json = json_encode($this->data);
    $value = urlsafe_base64_encode($json) . '.' . urlsafe_base64_encode($this->sign($json));
    setcookie($this->cookieName, $value);
  }

  private function verify($string, $signature) {
    return password_verify($this->secret . $string, $signature);
  }

  private function sign($string) {
    return password_hash($this->secret . $string, PASSWORD_BCRYPT);
  }
}