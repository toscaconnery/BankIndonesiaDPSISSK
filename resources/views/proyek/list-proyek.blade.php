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
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal">Tambah Proyek</button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Form Tambah Proyek</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" action="{{url('')}}/save-input-proyek" method="post">

                        {{ csrf_field() }}
                          <!--Name-->
                          <div class="form-group">
                            <label for="namaproyek" class="col-sm-3 control-label">Nama Proyek</label>

                            <div class="col-sm-9">
                              <input name="nama" type="text" class="form-control" id="namaproyek">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="kodema" class="col-sm-3 control-label">Kode MA</label>

                            <div class="col-sm-9">
                              <input name="kodema" type="text" class="form-control" id="kodema">
                            </div>
                          </div>
                          <!--Category-->
                          <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>

                            <div class="col-sm-9">
                              <input name="kategori" type="text" list="kategori" class="form-control"/>
                              <datalist id="kategori">
                                <option value="Program Strategis">Program Strategis</option>
                                <option value="Ad-Hoc">Ad-Hoc</option>
                                <option value="Small">Small</option>
                              </datalist>
                            </div>
                          </div>
                  <!-- <select name="browser" onchange='if(this.options[this.selectedIndex].value=='customOption'){toggleField(this,this.nextSibling); this.selectedIndex='0';}' class="form-control" style="width: 100%;">
                    <option>Program Strategis</option>
                    <option>Ad-Hoc</option>
                    <option>Small</option>
                    <option value="customOption">Lainnya</option>
                    <input name="browser" style="display:none;" disabled="disabled" onblur="if(this.value==''){toggleField(this,this.previousSibling);}">
                  </select> -->
                  <!--PIC-->
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">PIC</label>
                    <div class="col-sm-9">
                      <input name="pic" type="text" class="form-control" id="inputEmail3">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Rencana Jadwal</label>
                    <div class="col-sm-9">
                      <input name="tanggal" type="text" class="form-control pull-right" id="rencanajadwal">
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">
                      Status
                    </label>
                    <div class="col-sm-9">
                      <label>Inhouse
                        <input name="jenis" type="radio" name="status" value="Inhouse" class="minimal" checked>
                      </label>
                      <label style='margin-left:30px;'>Outsource
                        <input  name="jenis" type="radio" name="status" value="Outsource" class="minimal">
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-default" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                  <!-- /.box-body -->
                  <!-- /.box-footer -->
                </form>
              </div>
            </div>
          </div>
        </div>
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
            @foreach($proyek as $proyek)
              <tr>
                <td>{{$proyek->id}}</td>
                <td>{{$proyek->nama}}</td>
                <td>{{$proyek->kategori}}</td>
                <td>{{$proyek->pic}}</td>
                <td>{{$proyek->tgl_mulai}}</td>
                <td>{{$proyek->tgl_selesai}}</td>
                <td>{{$proyek->tgl_real_mulai ? $proyek->tgl_real_mulai : 'Belum dimulai'}}</td>
                <td>{{$proyek->tgl_real_selesai ? $proyek->tgl_real_selesai : 'Belum selesai'}}</td>
                <td>{{$proyek->jenis}}</td>
                <td>{{$proyek->status}}</td>
                <center><td><a href='{{url('')}}/input-tahap-proyek/{{$proyek->id}}'><button class="btn btn-primary">Detail</button></td></center>
              </tr>
            @endforeach
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
              <center><td><a href='{{url('')}}/input-tahap-proyek/1'><button class="btn btn-primary">Detail</button></td></center>
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
              <center><td><a href='{{url('')}}/input-tahap-proyek/1'><button class="btn btn-primary">Detail</button></td></center>
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
              <center><td><a href='{{url('')}}/input-tahap-proyek/1'><button class="btn btn-primary">Detail</button></td></center>
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
              <center><td><a href='{{url('')}}/input-tahap-proyek/1'><button class="btn btn-primary">Detail</button></td></center>
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
              <center><td><a href='{{url('')}}/input-tahap-proyek/1'><button class="btn btn-primary">Detail</button></td></center>
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
