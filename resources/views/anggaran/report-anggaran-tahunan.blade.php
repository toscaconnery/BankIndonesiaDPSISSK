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
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal">Tambah Anggaran</button>
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
                  @foreach($anggaran as $anggaran)
                    <tr>
                      <td>{{$anggaran->tahun}}</td>
                      <td>Rp. {{ number_format($anggaran->ri) }}</td>  {{-- ri dianggarkan --}}
                      <td>Rp. {{ number_format($anggaran->op) }}</td>  {{-- op dianggarkan --}}
                      <td>Rp. {{ number_format($anggaran->nominal) }}</td>  {{-- total dianggarkan --}}
                      <td>Rp. {{ number_format($anggaran->used_ri) }}</td>  {{-- ri realisasi --}}
                      <td width="10px">{{$anggaran->persen_ri}}%</td>  {{-- persen ri realisasi --}}
                      <td>Rp. {{ number_format($anggaran->used_op) }}</td>  {{-- op realisasi --}}
                      <td width="10px">{{$anggaran->persen_op}}%</td> {{-- persen op realisasi --}}
                      <td>Rp. {{ number_format($anggaran->used_total) }}</td>  {{-- total realisasi --}}
                      <td width="10px">80%</td> {{-- persen total realisasi --}}
                      <td>Rp. {{ number_format($anggaran->sisa) }}</td> {{-- sisa anggaran --}}
                      <td width="5px">{{$anggaran->persen_used}}%</td>   {{-- persen sisa anggaran --}}
                      <td><a href="{{url('')}}/report-anggaran-bulanan/{{$anggaran->tahun}}">Detail</a></td>
                    </tr>
                  @endforeach
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
                      <td>Rp. 34.000.000</td> {{-- sisa anggaran --}}
                      <td width="5px">5%</td>   {{-- persen sisa anggaran --}}
                      <td><a href="{{url('')}}/report-anggaran-bulanan">Detail</a></td>
                    </tr>
                  </tbody>
                </table>
                <center><button class="btn btn-default" style="font-weight: bold;" data-toggle="modal" data-target="#myModal2">Tambah Pengeluaran</button></center>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Tambah Anggaran Tahunan</h3></center>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST">

              {{ csrf_field() }}

              <!--Tahun Anggaran-->
              <div class="form-group">
              <label for="inputEmail3" class="col-md-3 control-label">Tahun Anggaran</label>
                <div class="col-md-9">
                  <select id="selectElementId" class="form-control select2" style="width: 100%;" name="tahun">
                  </select>
                </div>
              </div>

              <!--Nominal-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Nominal</label>
                <div class="col-md-9">
                  <input name="nominal" type="number" class="form-control" id="nominal">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Anggaran RI</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" id="ri" name="ri">
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Anggaran OP</label>
                <div class="col-md-9">
                  <input type="number" class="form-control" id="op" name="op">
                </div>
              </div>

              <!-- /.box-body -->
              <div class="form-group">
                <div class="modal-footer">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Tambah Pengeluaran</h3></center>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" action="{{url('')}}/input-pencairan-anggaran">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-9">
                  <input type="date" class="form-control pull-right" id="datepicker" name="tanggal">
                </div>
              </div>

              <!--Kategori-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Kategori</label>
                <div class="col-md-9">
                  <select class="form-control" name="kategori">
                    <option value="RI">RI</option>
                    <option value="OP">OP</option>                 
                  </select>
                </div>
              </div>

              <!--Nominal-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Nominal</label>
                <div class="col-md-9">
                  <input name="nominal" type="number" class="form-control" id="inputEmail3">
                </div>
              </div>

              <!--Keterangan-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Keterangan</label>
                <div class="col-md-9">
                  <textarea name="keterangan" type="text" class="form-control" id="inputEmail3"></textarea>
                </div>
              </div>


              <!-- /.box-body -->
              <div class="form-group">
                <div class="modal-footer">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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
  <script>
    var mulai = 2017
    var min = new Date().getFullYear(),
    max = min + 9,
    select = document.getElementById('selectElementId');

    for (var i = mulai; i<=max; i++){
      var opt = document.createElement('option');
      opt.value = i;
      opt.innerHTML = i;
      select.appendChild(opt);
    }
  </script>
  <script>
    $(function() {
      $("#ri, #op").on("keydown keyup", sum);
      function sum() {
        $("#nominal").val(Number($("#ri").val()) + Number($("#op").val()));
      </script>
</body>
</html>
