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
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Proyek APIK
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('')}}/list-proyek"><i class="fa fa-cubes"></i> Proyek</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-primary col-md-6">
              <div class="box-header">
                <h3 class="box-title">Sub Tahapan Pengajuan</h3>
              </div>
              <div class="box-body">
                <!-- Date -->
                <div class="form-group">

                  <label>Nama Sub Tahapan</label>
                  <input type="text" class="form-control" id="namatahapan" placeholder="Nama PIC">
                </div>
                <div class="form-group">
                  <label>PIC</label>
                  <input type="text" class="form-control" id="namatahapan" placeholder="Nama PIC">
                </div>
                <!-- /.form group -->

                <!-- Date range -->
                <div class="form-group">
                  <label>Jadwal Sub Tahapan:</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="rencanajadwal">
                  </div>
                  <!-- /.input group -->
                </div>

                <a href='{{url('')}}/input-tahap-proyek'><button class="btn btn-primary" style="float: right;">Submit</button></a>

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
                      <th>Nama Dokumen</th>
                      <th>Tanggal Upload</th>
                      <th>Jadwal Realisasi Tahapan</th>
                      <th>PIC</th>
                      <th>Status</th>
                      <th>Dokumen</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Spesifikasi Kebutuhan 1</td>
                      <td>2 Juli 2017</td>
                      <td>2 Juni 2017 - 8 Juni 2017</td>
                      <td>Pak Alam</td>
                      <td>Belum selesai</td>
                      <td width="11em">
                        <center>
                          <button style="width: 8em" type="button" id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#authenticationModal">Detail</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Spesifikasi Kebutuhan 2</td>
                      <td>2 Juli 2017</td>
                      <td>2 Juni 2017 - 8 Juni 2017</td>
                      <td>Pak Alam</td>
                      <td>Selesai</td>
                      <td width="11em">
                        <center>
                          <button style="width: 8em" type="button" id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#authenticationModal">Detail</button>
                        </center>
                      </td>
                    </tr>
                  </table>
                  <div id="authenticationModal" class="modal fade">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 center">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Sub Proyek Pengajuan : Sub 1</h4>
                        </div>
                        <!--CONTENT-->
                        <div style="overflow-y: scroll; height: 30em">
                          <div style="margin-left: 1em; margin-right: 1em">
                            <h3>2016</h3>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th width="1em">No</th>
                                  <th>Nama File</th>
                                  <th>PIC</th>
                                  <th style="width: 8em">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td width="1em">1</td>
                                  <td>File A 2017</td>
                                  <td>Sherlock</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">2</td>
                                  <td>File B 2017</td>
                                  <td>Sherlock</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">3</td>
                                  <td>File C 2017</td>
                                  <td>Sherlock</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div style="margin-left: 1em; margin-right: 1em;">
                            <h3>2017</h3>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th width="1em">No</th>
                                  <th>Nama File</th>
                                  <th>PIC</th>
                                  <th style="width: 8em">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td width="1em">1</td>
                                  <td>File A 2017</td>
                                  <td>Sherlock</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">2</td>
                                  <td>File B 2017</td>
                                  <td>Sherlock</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">3</td>
                                  <td>File C 2017</td>
                                  <td>Sherlock</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div style="margin-left: 1em; margin-right: 1em">
                          <form>
                            <div class="form-group">
                              <label>Tambah file</label>
                              <input type="file" class="form-control" id="namatahapan" placeholder="Nama PIC">
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-default">Confirm</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3"></div>
                  </div>
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
    <!-- Modal -->
    <script type="text/javascript">
        var modal = document.getElementById('authenticationModal');
        var btn = document.getElementById('showModal');

        btn.onclick = function {
            modal.display = "block";
        }

        window.onclick = function(event) {
            if(event.target == modal) {
                modal.display = "none";
            }
        }
    </script>

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
