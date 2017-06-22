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
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{url('')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{url('')}}/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{url('')}}/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{url('')}}/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="{{url('')}}/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{url('')}}/plugins/select2/select2.min.css">
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
                <form action="" method="post">
                  <div class="form-group">
                    <label>Sub Tahapan</label>
                    <input name="nama" type="text" class="form-control" id="namatahapan" placeholder="Nama Sub Tahapan">
                  </div>
                  <div class="form-group">
                    <label>PIC</label>
                    <input name="pic" type="text" class="form-control" id="namatahapan" placeholder="Nama PIC">
                  </div>
                  <div class="form-group">
                    <label>Jadwal Sub Tahapan:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="tanggal" type="text" class="form-control pull-right" id="rencanajadwal">
                    </div>
                  </div>
                  <div>
                    <input type="hidden" name="id_tahapan" value="{{$id_tahapan}}">
                    {{ csrf_field() }}
                  </div>
                  <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                </form>

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
                      <th>Nama Sub Tahapan</th>
                      <th>Jadwal Sub Tahapan</th>
                      <th>Realisasi Sub Tahapan</th>
                      <th>PIC</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Spesifikasi Kebutuhan 1</td>
                      <td>2 Juni 2017 - 8 Juni 2017</td>
                      <td>3 Juni 2017 - Sekarang</td>
                      <td>Pak Alam</td>
                      <td>Belum selesai</td>
                      <td width="11em">
                        <center>
                          <button style="width: 8em" type="button" id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#authenticationModal">Detail</button>
                        </center>
                      </td>
                    </tr>
                    @foreach($sub as $sub)
                      <tr>
                        <td>{{$sub->nama}}</td>
                        <td>{{$sub->tgl_mulai}} - {{$sub->tgl_selesai}}</td>
                        <td>
                          @if($sub->tgl_real_selesai)
                            {{$sub->tgl_real_mulai}} - {{$sub->tgl_real_selesai}}
                          @elseif($sub->tgl_real_mulai)
                            {{$sub->tgl_real_mulai}} - Sekarang
                          @else
                            Belum ada progress
                          @endif
                        </td>
                        <td>{{$sub->pic}}</td>
                        <td>{{$sub->status}}</td>
                        <td width="11em">
                          <center>
                            <button style="width: 8em" type="button" id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#authenticationModal">Detail</button>
                          </center>
                        </td>
                      </tr>
                    @endforeach
                    <tr>
                      <td>Spesifikasi Kebutuhan 2</td>
                      <td>2 Juni 2017 - 9 Juni 2017</td>
                      <td>2 Juni 2017 - 8 Juni 2017</td>
                      <td>Pak Alam</td>
                      <td>Selesai</td>
                      <td width="11em">
                        <center>
                          <button style="width: 8em" type="button" id="showModal" class="btn btn-primary" data-toggle="modal" data-target="#authenticationModal">Detail</button>
                        </center>
                      </td>
                    </tr>
                    <tr>
                      <td>Spesifikasi Kebutuhan 3</td>
                      <td>8 Juli 2017 - 12 Juli 2017</td>
                      <td>Belum ada progress</td>
                      <td>Pak Alam</td>
                      <td>Belum selesai</td>
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
                            <h3><b>2016</b></h3>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th width="1em">No</th>
                                  <th>Nama File</th>
                                  <th>PIC</th>
                                  <th>Tanggal</th>
                                  <th style="width: 8em"><center>Action</center></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td width="1em">1</td>
                                  <td>File A 2017</td>
                                  <td>Sherlock</td>
                                  <td>27/06/2012</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">2</td>
                                  <td>File B 2017</td>
                                  <td>Sherlock</td>
                                  <td>27/06/2012</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">3</td>
                                  <td>File C 2017</td>
                                  <td>Sherlock</td>
                                  <td>27/06/2012</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div style="margin-left: 1em; margin-right: 1em;">
                            <h3><b>2017</b></h3>
                            <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
                                  <th width="1em">No</th>
                                  <th>Nama File</th>
                                  <th>PIC</th>
                                  <th>Tanggal</th>
                                  <th style="width: 8em">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td width="1em">1</td>
                                  <td>File A 2017</td>
                                  <td>Sherlock</td>
                                  <td>27/06/2012</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">2</td>
                                  <td>File B 2017</td>
                                  <td>Sherlock</td>
                                  <td>27/06/2012</td>
                                  <td width="8em"><center><button class="btn btn-primary">Download</button></center></td>
                                </tr>
                                <tr>
                                  <td width="1em">3</td>
                                  <td>File C 2017</td>
                                  <td>Sherlock</td>
                                  <td>27/06/2012</td>
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
                          <button style="width: 9em" type="button" id="showConfirmation" class="btn btn-default" data-toggle="modal" data-target="#finishConfirmation">Mark as Finished</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3"></div>
                  </div>
                  <div id="finishConfirmation" class="modal fade">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><center>Konfirmasi tindakan</center></h4>
                        </div>
                        <!--CONTENT-->
                        <div style="margin: 1em; font-size: 2em">
                          <center>Selesaikan Sub Tahapan?</center>
                        </div>
                        <center>
                          <div>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Selesai</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                          </div>
                          <br>
                        </center>
                      </div>
                    </div>
                    <div class="col-lg-4"></div>
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
    <script type="text/javascript">
      var modal = document.getElementById('finishConfirmation');
      var btn = document.getElementById('showConfirmation');

      btn.onclick = function {
        modal.display = "block";
      }

      window.onclick = function(event) {
        if(event.target == modal) {
          modal.display = "none";
        }
      }
    </script>

    <script src="{{url('')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{url('')}}/bootstrap2/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="{{url('')}}/plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="{{url('')}}/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="{{url('')}}/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="{{url('')}}/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{url('')}}/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="{{url('')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="{{url('')}}/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="{{url('')}}/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- DataTables -->
    <script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{url('')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="{{url('')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{url('')}}/plugins/iCheck/icheck.min.js"></script>
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
