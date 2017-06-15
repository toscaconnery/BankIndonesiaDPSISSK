<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Project Management Application</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include 'header.php';?>
  <?php include 'navbar.php';?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="col-md-12">
        <h1>
          Proyek A
        </h1>
      </div>
      <br>
      <div class="col-sm-7">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h2 class="box-title">Tahap 1</h2>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal">
            <div class="box-body">
              
              <!--Description-->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Description</label>

                <div class="col-sm-10">
                  <input name="description" type="text" class="form-control" id="inputEmail3">
                </div>
              </div>

              <!--PIC-->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">PIC</label>

                <div class="col-sm-10">
                  <input name="pic" type="text" class="form-control" id="inputEmail3">
                </div>
              </div>

              <!--Date-->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                <div class="col-sm-5">
                  <input name="pic" type="date" class="form-control" id="inputEmail3">
                </div>
                <div class="col-sm-5">
                  <input name="pic" type="date" class="form-control" id="inputEmail3">
                </div>
              </div>


              <!--Status-->
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Status</label>

                <div class="col-sm-10">

                    <input type="radio"  name="r1" class="minimal"> Outsource


                    <input type="radio"  name="r1" class="minimal"> Insource

                </div>
              </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-default">Cancel</button>
              <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
            <!-- /.box-footer -->

            <div class="box-footer">
              <div class="box-header with-border">
                <h2 class="box-title">Progress Tahap 1</h2>
              </div>
              <div class="col-sm-12">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>File Name</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>File A</td>
                      <td>Uploaded</td>
                      <td><a href="#">Download</a></td>
                    </tr>
                    <tr>
                      <td>File A</td>
                      <td>Unfinished</td>
                      <td><a href="#">Download</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </form>
        </div>
        <!-- /.box -->
      </div>
    </section>
    <br>
  </div>
  <?php include 'footer.php';?>
</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button);</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
</body>
</html>
