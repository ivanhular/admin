<?php
class module extends db{

  public $id;
  public $module_name;
  public $status;
  public $canvas_link;
  public $preview_image;
  public $css_code;
  public $javascript_code;
  public $php_code;
  public $sass_code;
  public $html_code;
  public $description;
  public $tags;
  public $template_origin;
  public $develop_by;
  public $date_created;
  // public $last_edited;
  public $table_name = "modules";


  function __construct(){
    parent::__construct();
  }

  // public function get_all_modules(){
  //   return $this->find_query("SELECT * from modules");
  // }

  public function get_all_modules(){
    return $this->find_query("SELECT * from {$this->table_name}");
  }

  public function get_module_by_id($name){
    $result = $this->find_query("SELECT * FROM `{$this->table_name}` WHERE  `module_name` = '{$name}'");
    return $result;
  }

  public function module_exits($name){
      $result = $this->find_in($this->table_name , "module_name" , $name);
      if($result >= 1){
        return true;
      }
  }

  public function add_module($data){
      unset($data['action']);
      $change_key = array(
        "application/x-httpd-php" => "php_code",
        "text/html"               => "html_code",
        "css"                     => "css_code",
        "sass"                    => "sass_code",
        "javascript"              => "javascript_code"
      );

      foreach ($data as $key => $value) {
        if(array_key_exists($key,$change_key)){
            $data[$change_key[$key]] = $value;
            unset($data[$key]);
        }
      }

      // var_dump($data);
      if($result = $this->insert($data,$this->table_name)){

      }
      //   return "Module Saved!";
  }

  public function update_module($data){
      unset($data['action']);
      $change_key = array(
        "application/x-httpd-php" => "php_code",
        "text/html"               => "html_code",
        "css"                     => "css_code",
        "sass"                    => "sass_code",
        "javascript"              => "javascript_code"
      );

      foreach ($data as $key => $value) {
        if(array_key_exists($key,$change_key)){
            $data[$change_key[$key]] = $value;
            unset($data[$key]);
        }
      }

      if($result = $this->update($data,$this->table_name))
        return "Module Updated!";
  }



  public function set_new_module_count(){
    $result = $this->find_query("SELECT `module_name` FROM `modules` ORDER BY `date_created` DESC LIMIT 1");

    if($result){

        $pattern = '/(\d+)/m';

        $new_module_name = preg_replace_callback(
          $pattern,
          function($matches){
              return (int)$matches[0][0] + 1;
          },
         $result[0]->module_name
       );

        return $new_module_name;
    }else{

        return "module-1";
    }


  }

  public function get_current_date(){
    var_dump( date(DATE_ATOM) );
  }




  // public function loadModules(){
  //   $data = [];
  //
  //   $load_request =  $this->find_query("select * from `{$this->table_name}`");
  //
  //   foreach ($load_request as $key => $value) {
  //     array_push($data, $value);
  //   }
  //
  //   echo json_encode($load_request);
  //
  // }

}

?>
