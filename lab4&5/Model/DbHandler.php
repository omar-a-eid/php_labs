<?php
use Illuminate\Database\Capsule\Manager as Capsule;

class DbHandler implements DbHandler_Interface
{
  private $capsule;
  public function __construct()
  {
    $this->capsule = new Capsule;
  }
  public function connect()
  {
    $this->capsule->addConnection([
      "driver" => "mysql",
      "host" => __host__,
      "database" => __database__,
      "username" => __username__,
      "password" => __password__
    ]);

    $this->capsule->setAsGlobal();
    $this->capsule->bootEloquent();
  }
  public function get_data()
  {
  }
  public function disconnect()
  {
  }
  public function get_record_by_id($id, $primary_key)
  {
  }
  public function query($table)
  {
    return $this->capsule->table($table);
  }
}