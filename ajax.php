<?php
require_once('config.php');


if(isset($_REQUEST['type']) || isset($_REQUEST['theme']) || isset($_REQUEST['css']) || isset($_REQUEST['javascript']) || isset($_REQUEST['application/x-httpd-php']) || isset($_REQUEST['sass']) || isset($_REQUEST['text/html']) ){
  $data = Array (
  'type' => $_REQUEST['type'],
  'theme' =>  $_REQUEST['theme'],
  'cssFile' =>  $_REQUEST['css'],
  'scriptFile' =>  $_REQUEST['javascript'] ,
  'phpFile' => $_REQUEST['application/x-httpd-php'] ,
  'sassFile' => $_REQUEST['sass'] ,
  'htmlFile' => $_REQUEST['text/html'] ,
  );
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

class storage  {

  function __construct($db,$data){
      $this->db = $db;
      $this->data = $data;
  }

  function insert(){

    $id = $this->db->insert ('storage', $this->data);

    if($id){
      $response['success'] = "inserted";
    }
    else{
      $response['success'] = 'insert failed: ' . $this->db->getLastError();
    }
    echo  $response['success'];
  }

  function update(){

    $this->db->where ('id', $_REQUEST['id']);

    if ( $this->db->update ('storage', $this->data)){
      $response['success']  =  $this->db->count . ' records were updated' . 'id ' .$_REQUEST['id'];
    }
    else{
      $response['success']  = 'update failed: ' .  $this->db->getLastError();
    }
    echo  $response['success'];

  }

  function delete(){
    $this->db->where('id',$_REQUEST['id']);
    if($this->db->delete('users')) echo 'successfully deleted';

  }

  function load(){

    $storage =  $this->db->get("storage");

    echo json_encode($storage);

  }

}
if($action =="insert" || $action == "update"){
  $http = new storage($db,$data);
}else{
  $http = new storage($db,'');
}

$http->$action();



 ?>
