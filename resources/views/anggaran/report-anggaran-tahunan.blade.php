<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI PMO&RMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('')}}/bootstrap2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('')}}/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/skins/_all-skins.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Anggaran Tiap Tahun
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('')}}/report-anggaran-tahunan"><i class="fa fa-money"></i> Anggaran</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <a href='{{url('')}}/input-anggaran-tahunan'><button class="btn btn-lg btn-primary">Tambah Anggaran</button></a>
                <br>
                <br>
                <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th rowspan="2">Tahun</th>
                  <th colspan="3">Dianggarkan</th>
                  <th colspan="8">Realisasi</th>
                  <th rowspan="2">Detail</th>
                </tr>
                <tr>
                  <th>RI</th>
                  <th>OP</th>
                  <th>Total</th>
                  <th colspan="2">RI</th>
                  <th colspan="2">OP</th>
                  <th colspan="2">Total</th>
                  <th colspan="2">Sisa</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2016</td>
                  <td>Rp. 234.234.242</td>  {{-- ri dianggarkan --}}
                  <td>Rp. 234.234.242</td>  {{-- op dianggarkan --}}
                  <td>Rp. 468.468.484</td>  {{-- total dianggarkan --}}
                  <td>Rp. 234.234.242</td>  {{-- ri realisasi --}}
                  <td width="10px">100%</td>  {{-- persen ri realisasi --}}
                  <td>Rp. 200.234.242</td>  {{-- op realisasi --}}
                  <td width="10px">90%</td> {{-- persen op realisasi --}}
                  <td>Rp. 468.468.484</td>  {{-- total realisasi --}}
                  <td width="10px">80%</td> {{-- persen total realisasi --}}
                  <td>Bersisa Rp. 34.000.000</td> {{-- sisa anggaran --}}
                  <td width="5px">5%</td>   {{-- persen sisa anggaran --}}
                  <td><a href="{{url('')}}/report-anggaran-bulanan">Detail</a></td>
                </tr>
                <tr>
                  <td>2015</td>
                  <td>Rp. 234.234.242</td>  {{-- ri dianggarkan --}}
                  <td>Rp. 234.234.242</td>  {{-- op dianggarkan --}}
                  <td>Rp. 468.468.484</td>  {{-- total dianggarkan --}}
                  <td>Rp. 234.234.242</td>  {{-- ri realisasi --}}
                  <td width="10px">100%</td>  {{-- persen ri realisasi --}}
                  <td>Rp. 200.234.242</td>  {{-- op realisasi --}}
                  <td width="10px">90%</td> {{-- persen op realisasi --}}
                  <td>Rp. 468.468.484</td>  {{-- total realisasi --}}
                  <td width="10px">80%</td> {{-- persen total realisasi --}}
                  <td>Bersisa Rp. 34.000.000</td> {{-- sisa anggaran --}}
                  <td width="5px">5%</td>   {{-- persen sisa anggaran --}}
                  <td><a href="{{url('')}}/report-anggaran-bulanan">Detail</a></td>
                </tr>
                <tr>
                  <td>2014</td>
                  <td>Rp. 234.234.242</td>  {{-- ri dianggarkan --}}
                  <td>Rp. 234.234.242</td>  {{-- op dianggarkan --}}
                  <td>Rp. 468.468.484</td>  {{-- total dianggarkan --}}
                  <td>Rp. 234.234.242</td>  {{-- ri realisasi --}}
                  <td width="10px">100%</td>  {{-- persen ri realisasi --}}
                  <td>Rp. 200.234.242</td>  {{-- op realisasi --}}
                  <td width="10px">90%</td> {{-- persen op realisasi --}}
                  <td>Rp. 468.468.484</td>  {{-- total realisasi --}}
                  <td width="10px">80%</td> {{-- persen total realisasi --}}
                  <td>Bersisa Rp. 34.000.000</td> {{-- sisa anggaran --}}
                  <td width="5px">5%</td>   {{-- persen sisa anggaran --}}
                  <td><a href="{{url('')}}/report-anggaran-bulanan">Detail</a></td>
                </tr>
              </tbody>
            </table>
            <center><a href='{{url('')}}/input-pencairan-anggaran-bulanan'><button class="btn btn-default" style="font-weight: bold;">Tambah Pengeluaran</button></a></center>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>


      <br>
    </div>
    @include('layouts.footer')
  </div>

<script src="{{url('')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('')}}/bootstrap2/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="{{url('')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{url('')}}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('')}}/dist/js/demo.js"></script>
<!-- page script -->
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
