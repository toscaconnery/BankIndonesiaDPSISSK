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
          <a href="{{url('')}}/input-tahap-proyek/{{$id_proyek}}">{{$namaProyek}}</a>
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
              <h3 class="box-title">Input Tahapan</h3>
            </div>
            <form action="" method="post">
              <div class="box-body">
                
                {{ csrf_field() }}
                <input type="hidden" name="id_proyek" value="{{$id_proyek}}">
                <div class="form-group">
                <label>Nama Tahapan</label>
                  <select name="nama" class="form-control select2" style="width: 100%;">
                    @foreach($optionTahapan as $data)
                      <option value="{{$data->nilai}}">{{$data->nama}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                <label>PIC</label>
                  <input name="pic" type="text" class="form-control" id="namatahapan" placeholder="Nama PIC">
                </div>
                <!-- /.form group -->

                <!-- Date range -->
                <div class="form-group">
                  <label>Jadwal Tahapan:</label>

                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input name="tanggal" type="text" class="form-control pull-right" id="rencanajadwal">
                  </div>
                  <!-- /.input group -->
                </div>
                
                <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
                
                <!-- /.form group -->
              </div>
            </form>
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
                      <th rowspan="2">Nama Tahapan</th>
                      <th colspan="2">Jadwal Tahapan</th>
                      <th colspan="2">Jadwal Realisasi</th>
                      <th rowspan="2">PIC</th>
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
                    @foreach($tahapan as $tahapan)
                      <tr>
                        <td>
                          {{$tahapan->nama}}
                          @if($tahapan->status == "Finish")
                            <img src="{{url('')}}/icon/check.png" class="pull-right">
                          @endif
                        </td>
                        <td>{{$tahapan->tgl_mulai}}</td>
                        <td>{{$tahapan->tgl_selesai}}</td>
                        <td>{{$tahapan->tgl_real_mulai ? $tahapan->tgl_real_mulai : '-'}}</td>
                        <td>{{$tahapan->tgl_real_selesai ? $tahapan->tgl_real_selesai : '-'}}</td>
                        <td>{{$tahapan->pic}}</td>
                        <td>{{$tahapan->status}}</td>
                          <center>
                            <td align="center">
                              @if($tahapan->status == "Pending")
                                <a href='{{url('')}}/mulai-tahap-proyek/{{$tahapan->id}}'>
                                  <button class="btn btn-primary">Mulai</button>
                                </a>
                              @else
                                <a href='{{url('')}}/input-sub-tahapan/{{$tahapan->id}}'>
                                  <button class="btn btn-primary">Detail</button>
                                </a>
                              @endif
                                
                            </td>
                          </center>
                      </tr>
                    @endforeach
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

<!-- jQuery 2.2.3 -->
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
    $("#example1").DataTable({
      "ordering": false
    });
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
