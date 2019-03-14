<?php
  require_once('init.php');
// if(isset($_REQUEST['type']) || isset($_REQUEST['theme']) || isset($_REQUEST['css']) || isset($_REQUEST['javascript']) || isset($_REQUEST['application/x-httpd-php']) || isset($_REQUEST['sass']) || isset($_REQUEST['text/html']) ){
//   $data = array (
//   'module_name' => $_REQUEST['module_name'],
//   'status' =>  $_REQUEST['status'],
//   'canvas_link' =>  $_REQUEST['canvas_link'],
//   'preview_image' =>  $_REQUEST['preview_image'],
//   'css_code' =>  $_REQUEST['preview_image'],
//   'javascript_code' =>  $_REQUEST['javascript'],
//   'php_code' =>  $_REQUEST['application/x-httpd-php'],
//   'sass_code' =>  $_REQUEST['sass'],
//   'html_code' =>  $_REQUEST['text/html'],
//   'description' =>  $_REQUEST['description'],
//   'tags' =>  $_REQUEST['tags'],
//   'Template_origin' =>  $_REQUEST['Template_origin'],
//   'Develop_by' =>  $_REQUEST['Develop_by'],
//   'date_created' =>  $_REQUEST['date_created'],
//   'last_edited' =>  $_REQUEST['last_edited'],
//   );
// }


$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";

class httpRequest extends db {

  public $action;
  public $tableName;

  function __construct(){
      // $this->db = $db;
      // $this->data = $data;
      parent::__construct();
      $this->action = isset($_REQUEST['action']) ? $_REQUEST['action'] : "";
      $this->tableName = isset($_REQUEST['table_name']) ? $_REQUEST['table_name'] : "";

  }
  // function insert(){
  //
  //   $id = $this->db->insert ('storage', $this->data);
  //
  //   if($id){
  //     $response['success'] = "inserted";
  //   }
  //   else{
  //     $response['success'] = 'insert failed: ' . $this->db->getLastError();
  //   }
  //   echo  $response['success'];
  // }
  //
  // function update(){
  //
  //   $this->db->where ('id', $_REQUEST['id']);
  //
  //   if ( $this->db->update ('storage', $this->data)){
  //     $response['success']  =  $this->db->count . ' records were updated' . 'id ' .$_REQUEST['id'];
  //   }
  //   else{
  //     $response['success']  = 'update failed: ' .  $this->db->getLastError();
  //   }
  //   echo  $response['success'];
  //
  // }
  //
  // function delete(){
  //   $this->db->where('id',$_REQUEST['id']);
  //   if($this->db->delete('users')) echo 'successfully deleted';
  //
  // }

  public function load(){
    $data = [];

    $load_request =  $this->find_query("select * from `{$this->tableName}`");


    foreach ($load_request as $key => $value) {
      array_push($data, $value);
    }

    var_dump($load_request);


  }

}

// if($action =="insert" || $action == "update"){
//   $http = new httpRequest($db,$data);
// }else{
//   $http = new httpRequest();
// }
$http = new httpRequest();

$http->$action()




 ?>
