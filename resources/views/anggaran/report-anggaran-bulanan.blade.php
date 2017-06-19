<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI PMO&RMS</title>
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
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('layouts.header')
  @include('layouts.navbar')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pencairan Anggaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('')}}/report-anggaran-tahunan"><i class="fa fa-money"></i> Anggaran</a></li>
      </ol>
    </section>
    <section class="content">
    <div class="row">
    <div class="col-sm-7">
      <!-- Horizontal Form -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h2 class="box-title">Pencairan</h2>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal">
          <div class="box-body">

            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="10">No</th>
                  <th>Bulan</th>
                  <th>Nominal Dikeluarkan</th>
                  <th>Rincian</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Januari</td>
                  <td>23423</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Februari</td>
                  <td>200230</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">4</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Maret</td>
                  <td>342343</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">5</a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>April</td>
                  <td>234242</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">4</a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Mei</td>
                  <td>231542</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Juni</td>
                  <td>234232</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">5</a></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Juli</td>
                  <td>234234</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">6</a></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Agustus</td>
                  <td>237784</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>September</td>
                  <td>2000</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">4</a></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Oktober</td>
                  <td>834753</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">4</a></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Nopember</td>
                  <td>1023423</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Desember</td>
                  <td>234987</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">4</a></td>
                </tr>

              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </form>
      </div>
      <!-- /.box -->
    </div>
    </div>
    </section>
  </div>
  @include('layouts.footer')
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
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
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
</body>
</html>
