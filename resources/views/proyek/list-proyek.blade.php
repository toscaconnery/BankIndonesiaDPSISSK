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
          Daftar Proyek
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('')}}/list-proyek"><i class="fa fa-cubes"></i> Proyek</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <a href='{{url('')}}/input-proyek'><button class="btn btn-lg btn-primary">Tambah Proyek</button></a>
                <table id="example1" class="table table-bordered table-striped">
                <br>
                <br>
                  <thead>
                    <tr>
                      <th rowspan="2">ID Proyek</th>
                      <th rowspan="2">Nama Proyek</th>
                      <th rowspan="2">Kategori</th>
                      <th rowspan="2">PIC</th>
                      <th colspan="2">Tanggal Target</th>
                      <th colspan="2">Tanggal Realisasi</th>
                      <th rowspan="2">Jenis</th>
                      <th rowspan="2">Status</th>
                      <th rowspan="2">Detail</th>
                    </tr>
                    <tr>
                      <th>Mulai</th>
                      <th>Selesai</th>
                      <th>Mulai</th>
                      <th>Selesai</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>PR001</td>
                      <td>APIK</td>
                      <td>PS</td>
                      <td>Pak Alam</td>
                      <td>2 Juli 2017</td>
                      <td>3 Agustus 2017</td>
                      <td>2 Juli 2017</td>
                      <td>3 Agustus 2017</td>
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='{{url('')}}/input-tahap-proyek'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR002</td>
                      <td>SIMKU</td>
                      <td>PS</td>
                      <td>Pak Andris</td>
                      <td>2 Agustus 2017</td>
                      <td>3 September 2017</td>
                      <td>2 Agustus 2017</td>
                      <td>3 September 2017</td>
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='{{url('')}}/input-tahap-proyek'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR003</td>
                      <td>SSS</td>
                      <td>PS</td>
                      <td>Pak Oktav</td>
                      <td>2 September 2017</td>
                      <td>3 Oktober 2017</td>
                      <td>2 September 2017</td>
                      <td>3 Oktober 2017</td>
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='{{url('')}}/input-tahap-proyek'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR004</td>
                      <td>SI Uang Baru</td>
                      <td>Kecil</td>
                      <td>Pak Alam</td>
                      <td>1 Juli 2017</td>
                      <td>1 Agustus 2017</td>
                      <td>1 Juli 2017</td>
                      <td>1 Agustus 2017</td>
                      <td>Outsourcing</td>
                      <td>Selesai</td>
                      <center><td><a href='{{url('')}}/input-tahap-proyek'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR005</td>
                      <td>SI Bina Bangsa</td>
                      <td>PS</td>
                      <td>Mbak Chacha</td>
                      <td>2 Juni 2017</td>
                      <td>3 Agustus 2017</td>
                      <td>2 Juni 2017</td>
                      <td>3 Agustus 2017</td>
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='{{url('')}}/input-tahap-proyek'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                </table>
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
