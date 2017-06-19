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
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
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
          Pencairan TA Januari 2017
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-4">
          <div class="box box-primary col-md-6">
            <div class="box-header">
              <h3 class="box-title">Input Tahapan</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
              <label>Nama Proyek</label>
                <select class="form-control select2" style="width: 100%;">
                  <option>Proyek Apik</option>
                  <option>Proyek SIMKU</option>
                </select>
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Kategori</label>
                <div class="input-group">
                <label>OP
                  <input type="radio" name="r1" class="minimal" checked>
                </label>
                <label style='margin-left:30px;'>RI
                  <input type="radio" name="r1" class="minimal">
                </label>
                </div>
              </div>
              <!-- Date range -->
              <div class="form-group">
              <label>Nominal</label>
                <input type="number" class="form-control" id="namatahapan" placeholder="Nominal">
              </div>
              <div class="form-group">
              <label>Keterangan</label>
                <input type="text" class="form-control" id="namatahapan" placeholder="Keterangan Pengeluaran">
              </div>
              <div class="form-group">
                <label>Tanggal Pengeluaran</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              
              <a href='inp-thp-proyek.php'><button class="btn btn-primary" style="float: right;">Submit</button>
              
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <div class="col-xs-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="10">Tanggal</th>
                  <th>Status</th>
                  <th>Nominal</th>
                  <th>Rincian</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>OP</td>
                  <td>23423</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>RI</td>
                  <td>200230</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>RI</td>
                  <td>342343</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>OP</td>
                  <td>234242</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>OP</td>
                  <td>231542</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>RI</td>
                  <td>234232</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>RI</td>
                  <td>234234</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>OP</td>
                  <td>237784</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>RI</td>
                  <td>2000</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>RI</td>
                  <td>834753</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>OP</td>
                  <td>1023423</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>20</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>23</td>
                  <td>Tidak ada pencairan</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>24</td>
                  <td>Tidak ada pencairan</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>25</td>
                  <td>Tidak ada pencairan</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>26</td>
                  <td>Tidak ada pencairan</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>27</td>
                  <td>Tidak ada pencairan</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>28</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>29</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>30</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>
                <tr>
                  <td>31</td>
                  <td>OP</td>
                  <td>234987</td>
                  <td><a href="#">A, B, C</a></td>
                </tr>

              </tbody>
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

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
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
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#rencanajadwal').daterangepicker();
    $('#rencanajadwal2').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
