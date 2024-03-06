<?php
require_once "vendor/autoload.php";
$currentpage = isset($_GET['page']) ? $_GET['page'] : 0;
$db = new DbHandler();

try {
  $db->connect();
  $totalItems = $db->query("items")->count();
  $totalPages = floor($totalItems / itemsPerPage);
  $elementsSkipped = $currentpage * itemsPerPage;
  $items = $db->query("items")->skip($elementsSkipped)->take(itemsPerPage)->get();

  require_once "views/glasses_table.php";
} catch (\Exception $ex) {
  die("Error: " . $ex->getMessage());
}
$totalItems = $capsule->table("items")->count();
