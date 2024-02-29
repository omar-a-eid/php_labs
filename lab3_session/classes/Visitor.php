<?php

class Visitor
{
  public function counted()
  {
    $_SESSION["counted"] = true;
  }

  public function isCounted()
  {
    return isset($_SESSION["counted"]) && $_SESSION["counted"];
  }
}