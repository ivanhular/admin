<?php
  require_once('init.php');
?>
<!DOCTYPE html>
<html>

<?php include(__DIR__."/includes/header.php") ?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include(__DIR__."/includes/navbar.php");?>
  <!-- /.navbar -->

  <?php include(__DIR__."/includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Template Search</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">File Search</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fa fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->

            <!-- Main content -->
            <div class="invoice p-3 mb-3" style="display:none;">
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1"></label>
                  <input type="search" class="form-control form-control-lg" id="search" aria-describedby="emailHelp" placeholder="Enter search Keyword">
                  <!-- <small id="emailHelp" class="form-text text-muted">search for file</small> -->
                </div>
                <button type="submit" class="btn btn-primary">search</button>
            </form>
              <!-- title row -->
              <!--
            <!-- /.invoice -->
          </div><!-- /.col -->


        </div><!-- /.row -->
      </div><!-- /.container-fluid -->


      <div class="row">
        <div class="col-12">


          <div class="invoice p-3 mb-3">
            <table id="modules_table" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                    <?php
                    $obj = new module();
                    $obj = $obj->get_all_modules();
                    // foreach ($obj->get_all_modules() as $key => $value):?>
                      <?php //echo `<th>$ke</th>`
                        // var_dump($obj);

                      ?>
                    <?php  //endforeach; ?>
                    <th scope="col">Preview Image</th>
                    <th scope="col">Module Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Canvas Link</th>
                    <th scope="col">Description</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Template Origin</th>
                    <th scope="col">Action</th>
                  </tr>
              </thead>
            </table>
            <!-- <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Type</th>
                  <th scope="col">Theme</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
          // var_dump(get_object_vars($users));

                    //File Loop
                    // $storage = dbObject::table("storage")->get();
                //    $storage =  $db->get("storage");

                    //var_dump($storage);

                    // foreach ($storage as $key => $value) {
                    //     echo '<tr>
                    //           <td>'. $value['id'] .'</td>
                    //           <td>'. $value['type'] .'</td>
                    //           <td>'. $value['theme'] .'</td>
                    //           <td>
                    //           <a href="./edit.php?id='. $value['id'] .'" data-toggle="tooltip" data-placement="bottom" title="Edit Source Code"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                    //           <a href="" data-toggle="tooltip" data-placement="bottom" title="Delete File"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    //           </td>
                    //           </tr>';
                    // }

                  ?>


              </tbody>
            </table> -->

            <button type="button" class="btn btn-secondary">Add New</button>

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

<?php include_once(__DIR__."/includes/footer.php") ?>
</body>
</html>
