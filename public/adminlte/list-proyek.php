<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ReservationRoom</title>
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
    <?php include 'header.php';?>
    <?php include 'navbar.php';?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Daftar Proyek
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
                <a href='inp-proyek.php'><button class="btn btn-lg btn-primary">Tambah Proyek</button>
                <table id="example1" class="table table-bordered table-striped">
                <br>
                <br>
                  <thead>
                    <tr>
                      <th>ID Proyek</th>
                      <th>Nama Proyek</th>
                      <th>Kategori</th>
                      <th>PIC</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Selesai</th>
                      <th>Jenis</th>
                      <th>Status</th>
                      <th>Detail</th>
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
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='inp-thp-proyek.php'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR002</td>
                      <td>SIMKU</td>
                      <td>PS</td>
                      <td>Pak Andris</td>
                      <td>2 Agustus 2017</td>
                      <td>3 September 2017</td>
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='inp-thp-proyek.php'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR003</td>
                      <td>SSS</td>
                      <td>PS</td>
                      <td>Pak Oktav</td>
                      <td>2 September 2017</td>
                      <td>3 Oktober 2017</td>
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='inp-thp-proyek.php'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR004</td>
                      <td>SI Uang Baru</td>
                      <td>Kecil</td>
                      <td>Pak Alam</td>
                      <td>1 Juli 2017</td>
                      <td>1 Agustus 2017</td>
                      <td>Outsourcing</td>
                      <td>Selesai</td>
                      <center><td><a href='inp-thp-proyek.php'><button class="btn btn-primary">Detail</button></td></center>
                    </tr>
                    <tr>
                      <td>PR005</td>
                      <td>SI Bina Bangsa</td>
                      <td>PS</td>
                      <td>Mbak Chacha</td>
                      <td>2 Juni 2017</td>
                      <td>3 Agustus 2017</td>
                      <td>Inhouse</td>
                      <td>Selesai</td>
                      <center><td><a href='inp-thp-proyek.php'><button class="btn btn-primary">Detail</button></td></center>
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
    <?php include 'footer.php';?>
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
