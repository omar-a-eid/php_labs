<?php
class Counter
{
  public static function incrementCount()
  {
    $count = (int) self::getCount();
    $count += 1;

    $fhandle = fopen(COUNTER_FILE, "w");
    if ($fhandle) {
      fwrite($fhandle, $count);
      fclose($fhandle);
    } else {
      echo "Can't open the file";
    }
  }

  public static function getCount()
  {
    $fhandle = fopen(COUNTER_FILE, "r");
    if ($fhandle) {
      $count = fgets($fhandle);
      fclose($fhandle);
      return $count;
    } else {
      echo "Can't read file";
    }
  }
}
