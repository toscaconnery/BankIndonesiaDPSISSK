<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI PMO&RMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('')}}/bootstrap2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/morris/morris.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('layouts.header')
  @include('layouts.navbar')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Input Anggaran Tahunan
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('')}}/report-anggaran-tahunan"><i class="fa fa-money"></i> Anggaran</a></li>
      </ol>
    </section>
    <br>
    <div class="col-sm-6">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h2 class="box-title">Anggaran Tahunan</h2>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="" method="POST">
          <div class="box-body">
            
            {{ csrf_field() }}

            <!--Tahun Anggaran-->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Tahun Anggaran</label>
              <div class="col-sm-8">
                <select id="selectElementId" class="form-control select2" style="width: 100%;">
                </select>
              </div>
            </div>

            <!--Nominal-->
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Nominal</label>
              <div class="col-sm-8">
                <input name="nominal" type="number" class="form-control" id="inputEmail3">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Anggaran RI</label>
              <div class="col-sm-8">
                <input name="nominal" type="number" class="form-control" id="inputEmail3">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-4 control-label">Anggaran OP</label>
              <div class="col-sm-8">
                <input name="nominal" type="number" class="form-control" id="inputEmail3">
              </div>
            </div>

          </div>
          <!-- /.box-body -->
        </form>
        <div class="box-footer">
          <a href="{{url('')}}/report-anggaran-tahunan">
            <button class="btn btn-primary pull-right">Submit</button></a>
          </div>
      </div>
      <!-- /.box -->
    </div>
  </div>
  @include('layouts.footer')
</div>

<script src="{{url('')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button);</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('')}}/bootstrap2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{url('')}}/plugins/morris/morris.min.js"></script>
<script src="{{url('')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="{{url('')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{url('')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{url('')}}/plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{url('')}}/plugins/daterangepicker/daterangepicker.js"></script>
<script src="{{url('')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="{{url('')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="{{url('')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="{{url('')}}/plugins/fastclick/fastclick.js"></script>
<script src="{{url('')}}/dist/js/app.min.js"></script>
<script src="{{url('')}}/dist/js/pages/dashboard.js"></script>
<script src="{{url('')}}/dist/js/demo.js"></script>
<script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{url('')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
  var mulai = 2017
  var min = new Date().getFullYear(),
  max = min + 9,
  select = document.getElementById('selectElementId');

  for (var i = mulai; i<=max; i++){
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
  }
</script>
</body>
</html>
