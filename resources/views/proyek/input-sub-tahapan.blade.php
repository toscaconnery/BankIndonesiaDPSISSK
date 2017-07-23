<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPANG BI</title>
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
  <link rel="stylesheet" href="{{url('')}}/sweetalert/dist/sweetalert.css">
  
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          <a href="{{url('')}}/input-tahap-proyek/{{$id_proyek}}">{{$namaProyek}}</a> >
          <a href="{{url('')}}/input-sub-tahapan/{{$id_tahapan}}">{{$namaTahapan}}</a>
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
                    <input name="namaSubTahapan" id="namaSubTahapan" type="text" list="listSubTahapan" class="form-control" placeholder="Nama Sub Tahapan"/>
                      <datalist id="listSubTahapan">
                        @foreach($optionSubTahapan as $data)
                          <option value="{{$data->nama}}">{{$data->nama}}</option>
                        @endforeach
                      </datalist>
                  </div>
                  <div class="form-group">
                    <label>PIC</label>
                    <input name="pic" type="text" class="form-control" id="picSubTahapan" placeholder="Nama PIC">
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
                  <!-- nih aku edit bawah nih FAISHAL -->
                  @if(!is_null($sub))
                  
                  <a href="{{url('')}}/selesaikan-semua-sub-tahapan/{{$id_tahapan}}"><button type="button" class="btn btn-primary" style="float: left;">Semuanya Telah Selesai</button></a>
                  
                  @else
                  
                  <button type="button" class="btn btn-primary" style="float: left;" disabled>Semuanya Telah Selesai</button></a>
                  
                  @endif
                  <button id="buttonSaveSubTahapan" type="submit" class="btn btn-primary" style="float: right;">Submit</button>
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
                    @foreach($sub as $sub)
                    <tr>
                      <td>
                        {{$sub->nama}}
                        @if($sub->status == "Finish")
                          <img src="{{url('')}}/icon/check.png" class="pull-right">
                        @endif
                      </td>
                      <td>{{date('d F Y',strtotime($sub->tgl_mulai))}} - {{date('d F Y',strtotime($sub->tgl_selesai))}}</td>
                      <td>
                        @if($sub->tgl_real_selesai)
                        {{date('d F Y',strtotime($sub->tgl_real_mulai))}} - {{date('d F Y',strtotime($sub->tgl_real_selesai))}}
                        @elseif($sub->tgl_real_mulai)
                        {{date('d F Y',strtotime($sub->tgl_real_mulai))}} - Sekarang
                        @else
                        Belum ada progress
                        @endif
                      </td>
                      <td>{{$sub->pic}}</td>
                      <td align="center">{{$sub->status}}</td>
                      <td align="center">
                        {{-- jika belum dimulai --}}
                        @if($sub->status == "Pending")
                        <a href="{{url('')}}/mulai-sub-tahapan-proyek/{{ $sub->id }}">
                          <button type="button" style="width: 9em" class="btn btn-primary">Mulai</button>
                        </a>
                        {{-- jika sedang berlangsung --}}
                        @elseif($sub->status == "On Progress")
                        <a href="{{url('')}}/list-file-sub-tahapan/{{ $sub->id }}">
                          <button type="button" style="width: 4em" class="btn btn-primary">Detail</button>
                        </a>
                        <a href="{{url('')}}/selesaikan-sub-tahapan/{{ $sub->id }}">
                          <button type="button" style="width: 5em" class="btn btn-primary">Selesai</button>
                        </a>
                        <a href="{{url('')}}/delete-sub-tahapan/{{ $sub->id }}">
                          <button type="button" style="width: 5em" class="btn btn-primary">Hapus</button>
                        </a>
                        {{-- jika telah selesai --}}
                        @elseif($sub->status == "Finish")
                        <a href="{{url('')}}/list-file-sub-tahapan/{{ $sub->id }}">
                          <button type="button" style="width: 9em" class="btn btn-primary">Detail</button>
                        </a>
                        @endif
                      </td>
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
    <script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
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
    <script type="text/javascript">
  $(function(){
    $("#buttonSaveSubTahapan").click(function(event){
      if(document.getElementById('namaSubTahapan').value === ''){
        swal({
          title: "Nama sub tahapan tidak boleh kosong.",
          type: "warning",
          allowOutsideClick: true,
        });
        return false;
      }
      if(document.getElementById('picSubTahapan').value === ''){
        swal({
          title: "Nama PIC tidak boleh kosong.",
          type: "warning",
          allowOutsideClick: true,
        });
        return false;
      }
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
