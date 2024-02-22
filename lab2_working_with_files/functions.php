<?php

function submit_data_to_files($name, $email)
{
  $logs = fopen(LOGS_PATH, "a");
  if ($logs) {
    $userInfo = date(DATE_FORMAT) . "," . $_SERVER['REMOTE_ADDR'] . "," . $email . "," . $name . PHP_EOL;
    fwrite($logs, $userInfo);
    fclose($logs);
  } else {
    echo "Can't open the file";
  }
}
function display_user_data()
{
  $fhandle = fopen(LOGS_PATH, "r");
  if ($fhandle) {
    while (($line = fgets($fhandle)) !== false) {
      $words = explode(",", $line);
      echo "Visit Date: $words[0] <br />";
      echo "IP Address: $words[1] <br />";
      echo "Email: $words[2] <br />";
      echo "Name: $words[3] <br />";
      echo "<br />";
    }

    fclose($fhandle);
    die("<br /> To add a new user <a href='index.php?view=add'> Click Here </a>");
  } else {
    echo "Can't read file";
  }

}