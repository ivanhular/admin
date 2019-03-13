<?php
class User extends db{

  public $id;
  public $username;
  public $password;

  function __construct(){
    parent::__construct();
  }

  public function get_all_users(){
    return $this->find_query("SELECT * from users");
  }

}

?>
