<?php
error_reporting(0);

function h($str)
{
  echo htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function baby_hash($msg)
{
  $t = array(5676567,  858051, 5476703,  265259,
             4058727, 5112531,  964143, 1099579,
             8277687, 8717411, 2022783, 7207499,
             1997447, 5864691,  828623, 3917019
            );

  $v = array(7602007, 2906371, 4037663, 3996139);

  $n = intdiv(6 + strlen($msg), 7);
  $msg = str_pad($msg, 7 * $n, "0", STR_PAD_RIGHT);

  for($i = 0; $i < $n; $i++)
  {
    $s = intval(substr($msg, 7 * ($n - $i - 1), 7), 10);
    $k = $t[$i % 16];
    $a = $v[1 + $i % 3];
    $b = $v[1 + (1 + $i) % 3];
    $c = $v[1 + (2 + $i) % 3];
    $d = ($a * $b + $b * $c + $c * $s ^ $k) % 10000000;
    $v = array(($d + $v[1]) % 10000000, ($d | $v[2]) % 10000000, $d * $v[3] % 10000000, $d);
  }
  
  $r = "";
  for($i = 0; $i < 4; $i++)
  {
    $r = $r . str_pad($v[$i], 7, "0", STR_PAD_LEFT);
  }

  return $r;
}

function verify($progress, $answer, $salt)
{
  if(preg_match("/^[0-9]{43}$/", $progress) &&
     preg_match("/^[0-9]{1,5}$/", $answer) &&
     intval(substr($progress, 5, 4), 10) + intval(substr($progress, 19, 4), 10) === intval($answer, 10) &&
     baby_hash(intval(substr($progress, 28, 15), 10) . $salt) === substr($progress, 0, 28)
    )
  {
    return TRUE;
  }
  return FALSE;
}

$salt = "20988936657440586486151264256610222593863921";

usleep(200000);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $progress = $_POST['progress'];
  $answer = $_POST['answer'];
  if(verify($progress, $answer, $salt))
  {
    $cleared = intval(substr($progress, 28, 22), 10) + 1;
    $new_progress = baby_hash($cleared . $salt) . str_pad(strval($cleared), 15, "0", STR_PAD_LEFT);
    $left = intval(substr($new_progress, 5, 4), 10);
    $right = intval(substr($new_progress, 19, 4), 10);
  }
  else
  {
    $cleared = 0;
    $new_progress = baby_hash("0" . $salt) . "000000000000000";
    $left = intval(substr($new_progress, 5, 4), 10);
    $right = intval(substr($new_progress, 19, 4), 10);
  }
}
else
{
    $cleared = 0;
    $new_progress = baby_hash("0" . $salt) . "000000000000000";
    $left = intval(substr($new_progress, 5, 4), 10);
    $right = intval(substr($new_progress, 19, 4), 10);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
if($cleared >= 1000000000000000)
{
?>
<p> Congrats, The flag for this problem is this: 
<pre>HarekazeCTF{The_prefix_representing_one_quadrillion_times_of_a_unit_is_peta.}</pre>
</p>
<?php
}
else
{
?>

<p> Question <?php h($cleared + 1); ?> / 1000000000000000</p>
<form action="#" method="post">
<p>
<?php h($left) ?> + <?php h($right) ?> = <input type="text" name="answer">.
<input type="hidden" name="progress" value="<?php h($new_progress) ?>">
<input type="submit" value="Submit">
</p>
</form>

<?php
}
?>

</body>
</html>
