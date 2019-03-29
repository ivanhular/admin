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
            <h1>Add Module</h1>
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
                <label for="input-type">Module Name</label>
                <input type="text" class="w-100 form-control" name="module_name" value="module-1" disabled>
              </div>

              <div class="form-group">
                <label for="input-type">Canvas link</label>
                <input type="text" class="w-100 form-control" name="canvas_link" >
              </div>

              <div class="form-group">
                <label for="Template_origin">Template Origin</label>
                <input type="text" class="w-100 form-control" name="Template_origin" >
              </div>

              <div class="form-group">
                <label for="input-type">Preview Image</label>
                <input type="text" class="w-100 form-control" name="preview_image" >
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="w-100 form-control" rows="8" cols="80"></textarea>
              </div>

              <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" class="w-100 form-control" name="tags" >
              </div>

              <div class="form-group">
                <label for="css_code">CSS Code</label>
                <textarea class="form-control" id="css" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="sass">SCSS Code</label>
                <textarea class="form-control" id="sass" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="javascript_code">Javascript Code</label>
                <textarea class="form-control" id="javascript_code" rows="3"></textarea>
              </div>


              <div class="form-group">
                <label for="application/x-httpd-php">PHP Code</label>
                <textarea class="form-control" id="application/x-httpd-php" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label for="text/html">HTML Code</label>
                <textarea class="form-control" id="text/html" rows="3"></textarea>
              </div>
            </form>

            <button id="add-btn" type="button" class="btn btn-secondary">Save</button>

        </div><!-- /.col -->


      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer no-print">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io"></a>.</strong> All rights
    reserved.
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php include_once(__DIR__."/includes/footer.php") ?>
</body>

</body>
</html>
