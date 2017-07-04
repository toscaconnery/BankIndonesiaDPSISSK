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
        Pencairan Anggaran {{$tahun_ang}}
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
                  <th style="vertical-align:middle;text-align:center" rowspan="2" width="10">No</th>
                  <th style="vertical-align:middle;text-align:center" rowspan="2">Bulan</th>
                  <th style="text-align:center;" colspan="6">Nominal Dikeluarkan</th>
                  <th style="vertical-align:middle;text-align:center" rowspan="2">Rincian</th>
                </tr>
                <tr>
                  <th style="text-align:center;" colspan="2">RI</th>
                  <th style="text-align:center;" colspan="2">OP</th>
                  <th style="text-align:center;" colspan="2">Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Januari</td>
                  <td>23423</td>
                  <td>100%</td>
                  <td>23222</td>
                  <td>90%</td>
                  <td>46845</td>
                  <td>95%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Februari</td>
                  <td>23423</td>
                  <td>10%</td>
                  <td>23222</td>
                  <td>9%</td>
                  <td>46845</td>
                  <td>5%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">4</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Maret</td>
                  <td>23423</td>
                  <td>20%</td>
                  <td>23222</td>
                  <td>15%</td>
                  <td>46845</td>
                  <td>22%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">5</a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>April</td>
                  <td>23423</td>
                  <td>24%</td>
                  <td>23222</td>
                  <td>21%</td>
                  <td>46845</td>
                  <td>29%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">4</a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Mei</td>
                  <td>23423</td>
                  <td>29%</td>
                  <td>23222</td>
                  <td>32%</td>
                  <td>46845</td>
                  <td>36%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Juni</td>
                  <td>23423</td>
                  <td>35%</td>
                  <td>23222</td>
                  <td>44%</td>
                  <td>46845</td>
                  <td>48%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">6</a></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Juli</td>
                  <td>23423</td>
                  <td>45%</td>
                  <td>23222</td>
                  <td>49%</td>
                  <td>46845</td>
                  <td>52%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">2</a></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Agustus</td>
                  <td>23423</td>
                  <td>45%</td>
                  <td>23222</td>
                  <td>58%</td>
                  <td>46845</td>
                  <td>58%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>September</td>
                  <td>23423</td>
                  <td>45%</td>
                  <td>23222</td>
                  <td>58%</td>
                  <td>46845</td>
                  <td>58%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Oktober</td>
                  <td>23423</td>
                  <td>45%</td>
                  <td>23222</td>
                  <td>58%</td>
                  <td>46845</td>
                  <td>58%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>Nopember</td>
                  <td>23423</td>
                  <td>45%</td>
                  <td>23222</td>
                  <td>58%</td>
                  <td>46845</td>
                  <td>58%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Desember</td>
                  <td>23423</td>
                  <td>45%</td>
                  <td>23222</td>
                  <td>58%</td>
                  <td>46845</td>
                  <td>58%</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci">3</a></td>
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
</body>
</html>
