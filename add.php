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
            <h1>Add New File</h1>
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
                  <option>Vet</option>
                  <option>Surgery</option>
                  <option>real estate</option>
                </select>
              </div>

              <div class="form-group">
                <label for="input-theme">Theme</label>
                <select class="form-control" id="input-theme">
                  <option>theme1</option>
                  <option>theme2</option>
                  <option>theme3</option>
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

            <button id="add-btn" type="button" class="btn btn-secondary">Save</button>

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

<script type="text/javascript">
// 
// var glob ={};
//
// var modes = [
//         "javascript",
//         "css",
//         "sass",
//         "application/x-httpd-php",
//         "text/html",
//   ];
//
// $('textarea').each(function(index){
//
//   var id = $(this).attr('id');
//   var setMode ="";
//
//   for (var i = 0; i <= modes.length -1; i++) {
//         //var regex = /modes[i]/g
//        if(modes[i] == id){
//          setMode = modes[i];
//
//        }
//   }
//
//     glob[id] = CodeMirror.fromTextArea(document.getElementById(id), {
//     lineNumbers: true,
//     //extraKeys: {"Ctrl-Space": "autocomplete"},
//     mode: setMode,
//     indentUnit: 4,
//     indentWithTabs: true
//   });
//
//
// });

</script>

</body>
</html>
