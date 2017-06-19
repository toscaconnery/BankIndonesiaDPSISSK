<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI PMO&RMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
          <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
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
                  <th colspan="4">Realisasi</th>
                  <th rowspan="2">Detail</th>
                </tr>
                <tr>
                  <th>RI</th>
                  <th>OP</th>
                  <th>Total</th>
                  <th>RI</th>
                  <th>OP</th>
                  <th>Total</th>
                  <th>Sisa</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2015</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 468.468.484</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 200.234.242</td>
                  <td>Rp. 468.468.484</td>
                  <td>Bersisa Rp. 34.000.000</td>
                  <td><a href="{{url('')}}/report-anggaran-bulanan">Detail</a></td>
                </tr>
                <tr>
                  <td>2016</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 468.468.484</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 212.234.242</td>
                  <td>Rp. 468.468.484</td>
                  <td>Bersisa Rp. 22.000.000</td>
                  <td><a href="{{url('')}}/report-anggaran-bulanan">Detail</a></td>
                </tr>
                <tr>
                  <td>2017</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 468.468.484</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 234.234.242</td>
                  <td>Rp. 468.468.484</td>
                  <td>Terpakai semua</td>
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

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
