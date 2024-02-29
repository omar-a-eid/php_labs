<?php
session_start();
require_once("vendor/autoload.php");
$visitor = new Visitor();
$ha = $visitor->isCounted();
if (!$visitor->isCounted()) {
  Counter::incrementCount();
  $visitor->counted();
}
?>


<html>

<head>
  <title> contact form </title>
</head>

<body>
  <?php
  $count = Counter::getCount();

  echo "<h1>The number of visitors: $count</h1>";
  ?>
</body>

</html>

<?php

?>