<?php
  require_once('config.php');
?>

<?php
  $type = array(
      'Vet',
      'Surgery',
      'real estate',
  );
  $theme = array(
      'theme1',
      'theme2',
      'theme3',
  );

    $sort = [];
    $storage = $db->where('id',$_REQUEST["id"]);
    $results = $db->get('storage');
    $data = array(
        'id' =>  $results[0]["id"],
        'sass' => $results[0]["sassFile"],
        'css' => $results[0]["cssFile"],
        'application/x-httpd-php' => $results[0]["phpFile"],
        'text/html' => $results[0]["htmlFile"],
        'javascript' => $results[0]["scriptFile"]

    );

    if(isset($_REQUEST["id"]) && isset($_REQUEST["action"]) == "load"){
        echo json_encode($data);
        exit;
    }

    function sort_selected($arr = [], $n_sort , $storage){
      unset($sort);
      //var_dump($sort);
      foreach ($storage as $key => $value) {
        $selected = $value;
         for ($i =0; $i <= count($arr) -1 ; $i++) {
           if ($selected == $arr[$i]) {
              array_unshift($n_sort,$arr[$i]);
              $n_sort = array_unique(array_merge($n_sort,$arr));
           }
         }

      }
      var_dump($n_sort);
      foreach ($n_sort as $key => $value) {
          echo "<option>{$value}</option>";
      }

    }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--toastr-->
  <link href="./node_modules/toastr/build/toastr.css" rel="stylesheet">
  <!-- codemirror  -->
  <link rel="stylesheet" href="./plugins/CodeMirror-master/lib/codemirror.css">


  <!--script type="text/javascript" src="./plugins/require-js/require.js"></script-->

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments-o"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell-o"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fa fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php include_once("sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit File</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">


      <div class="row">
        <div class="col-12">


          <div class="invoice p-3 mb-3">
            <form>
              <div class="form-group">
                <label for="input-type">Type</label>
                <select class="form-control" id="input-type">
                  <?php sort_selected($type, $sort ,$storage); ?>
                </select>
              </div>

              <div class="form-group">
                <label for="input-theme">Theme</label>


                <select class="form-control" id="input-theme">
                  <?php sort_selected($theme, $sort ,$storage); ?>
                </select>


              </div>
              <div class="form-group">
                <label for="sass">Sass code</label>
                <textarea class="form-control" id="sass" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="css">Css code</label>
                <textarea class="form-control" id="css" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="javascript">Javascript code</label>
                <textarea class="form-control" id="javascript" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="text/html">HTML code</label>
                <textarea class="form-control" id="text/html" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="text/html">PHP snippet</label>
                <textarea class="form-control" id="application/x-httpd-php" rows="3"></textarea>
              </div>

              </div>


            </form>

            <button id="update-btn" type="button" class="btn btn-secondary">Save</button>

        </div><!-- /.col -->


      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io"></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once("footer.php") ?>
</body>

<script type="text/javascript">






</script>

<script type="text/javascript" src="functions.js"></script>

</html>
