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
          Pencairan Anggaran {{$tahun_anggaran}}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('')}}/report-anggaran-tahunan"><i class="fa fa-money"></i> Anggaran</a></li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h2 class="box-title">Pencairan</h2>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">Bulan</th>
                      <th colspan="6">Nominal Dikeluarkan</th>
                      <th rowspan="2">Rincian</th>
                    </tr>
                    <tr>
                      <th colspan="2">RI</th>
                      <th colspan="2">OP</th>
                      <th colspan="2">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($jlh_pengeluaran_bulanan as $jlh_pengeluaran_bulanan)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$jlh_pengeluaran_bulanan->Bulan}}</td>
                      <td>Rp {{number_format ($jlh_pengeluaran_bulanan->sumri)}}</td>
                      <td>100%</td>
                      <td>Rp {{number_format ($jlh_pengeluaran_bulanan->sumop)}}</td>
                      <td>90%</td>
                      <td>Rp {{number_format ($jlh_pengeluaran_bulanan->sumtot)}}</td>
                      <td>95%</td>
                      <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/{{$jlh_pengeluaran_bulanan->idbulan}}">{{$jlh_pengeluaran_bulanan->Jumlah}}</a></td>
                    </tr>
                    @endforeach
                <!-- <tr>
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
                </tr> -->
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
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
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "order": [[ 0, "desc" ]],
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
