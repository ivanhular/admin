<?php
  ob_start();
  include('init.php');
  include('database.php');
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
            <h1>File Search</h1>
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
            <div class="invoice p-3 mb-3">
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

      <?php
          var_dump($db);
       ?>
      <div class="row">
        <div class="col-12">

          <div class="invoice p-3 mb-3">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Type</th>
                  <th scope="col">Theme</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

              <tbody>

              </tbody>
            </table>

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
