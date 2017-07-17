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
  <link rel="stylesheet" href="{{url('')}}/sweetalert/dist/sweetalert.css">
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
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="box">
              <!-- /.box-header -->
              <div class="box-body">
                <button class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal">Tambah Anggaran</button>
                <table id="example1" class="table table-bordered table-striped">
                  <br>
                  <br>
                  <thead>
                    <tr>
                      <th rowspan="3">Tahun</th>
                      <th colspan="3">Dianggarkan</th>
                      <th colspan="6">Realisasi</th>
                      <th colspan="2">Sisa</th>
                      <th colspan="2">Action</th>
                    </tr>
                    <tr>
                      <th rowspan="2">RI</th>
                      <th rowspan="2">OP</th>
                      <th rowspan="2">Total</th>
                      <th colspan="2">RI</th>
                      <th colspan="2">OP</th>
                      <th colspan="2">Total</th>
                      <th rowspan="2">Angka</th>
                      <th rowspan="2">%</th>
                      <th rowspan="2">Detail</th>
                      <th rowspan="2">Update</th>
                    </tr>
                    <tr>
                      <th>Angka</th>
                      <th>%</th>
                      <th>Angka</th>
                      <th>%</th>
                      <th>Angka</th>
                      <th>%</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($anggaran as $anggaran)
                    <tr>
                      <td align="center">{{$anggaran->tahun}}</td>
                      <td>Rp. {{ number_format($anggaran->ri, 0, ',', '.') }}</td>  {{-- ri dianggarkan --}}
                      <td>Rp. {{ number_format($anggaran->op, 0, ',', '.') }}</td>  {{-- op dianggarkan --}}
                      <td>Rp. {{ number_format($anggaran->nominal, 0, ',', '.') }}</td>  {{-- total dianggarkan --}}
                      <td>Rp. {{ number_format($anggaran->used_ri, 0, ',', '.') }}</td>  {{-- ri realisasi --}}
                      <td>{{$anggaran->persen_ri}}%</td>  {{-- persen ri realisasi --}}
                      <td>Rp. {{ number_format($anggaran->used_op, 0, ',', '.') }}</td>  {{-- op realisasi --}}
                      <td>{{$anggaran->persen_op}}%</td> {{-- persen op realisasi --}}
                      <td>Rp. {{ number_format($anggaran->used_total, 0, ',', '.') }}</td>  {{-- total realisasi --}}
                      <td>{{$anggaran->persen_realisasi}}%</td> {{-- persen total realisasi --}}
                      <td>Rp. {{ number_format($anggaran->sisa, 0, ',', '.') }}</td> {{-- sisa anggaran --}}
                      <td align="center">{{$anggaran->persen_used}}%</td>   {{-- persen sisa anggaran --}}
                      <td align="center" 'white-space: nowrap'>
                        <a href='{{url('')}}/report-anggaran-bulanan/{{$anggaran->tahun}}'>
                          <button class="btn btn-primary">Detail</button>
                        </a>
                      </td>
                      <td align="center" 'white-space: nowrap'>
                        <button class="btn btn-default" data-toggle="modal" data-target="#edit{{$anggaran->tahun}}">Edit</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
    
    @foreach($anggaranedit as $anggaranedit)
      <div class="modal fade" id="edit{{$anggaranedit->tahun}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Edit Anggaran Tahun {{$anggaranedit->tahun}}</h3></center>
            </div>
            <div class="modal-body">
              <form name="anggarantahunanedit{{$anggaranedit->id}}" id="anggarantahunanedit{{$anggaranedit->id}}" class="form-horizontal" method="POST" action="{{url('')}}/edit-anggaran-tahunan">

                {{ csrf_field() }}

                <!--Tahun Anggaran-->
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label">Tahun Anggaran</label>
                  <div class="col-md-9">
                    <input type="number" class="form-control" id="tahunEdit{{$anggaranedit->id}}" name="tahunEdit" value="{{$anggaranedit->tahun}}" readonly="readonly">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label">Anggaran RI</label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="number" class="form-control" id="riEdit{{$anggaranedit->id}}" name="riEdit" onkeyup="calc()" value="{{$anggaranedit->ri}}">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label">Anggaran OP</label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input type="number" class="form-control" id="opEdit{{$anggaranedit->id}}" name="opEdit" onkeyup="calc()" value="{{$anggaranedit->op}}">
                    </div>
                  </div>
                </div>

                <!--Nominal-->
                <div class="form-group">
                  <label for="inputEmail3" class="col-md-3 control-label">Total</label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <span class="input-group-addon">Rp</span>
                      <input name="nominalEdit" type="number" class="form-control" id="nominalEdit{{$anggaranedit->id}}" value="{{$anggaranedit->nominal}}">
                    </div>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="form-group">
                  <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Cancel</button>
                    <button type="submit" id="validasiformedit{{$anggaranedit->id}}" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Tambah Anggaran Tahunan</h3></center>
          </div>
          <div class="modal-body">
            <form name="anggarantahunan" class="form-horizontal" method="POST">

              {{ csrf_field() }}

              <!--Tahun Anggaran-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Tahun Anggaran</label>
                <div class="col-md-9">
                  <select id="pilihtahun" class="form-control select2" style="width: 100%;" name="tahun" autofocus required>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Anggaran RI</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <input type="number" class="form-control" id="ri" name="ri" onkeyup="calc()" autofocus required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Anggaran OP</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <input type="number" class="form-control" id="op" name="op" onkeyup="calc()" autofocus required>
                  </div>
                </div>
              </div>

              <!--Nominal-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Total</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <span class="input-group-addon">Rp</span>
                    <input name="nominal" type="number" class="form-control" id="nominal" autofocus required>
                  </div>
                </div>
              </div>

              <!-- /.box-body -->
              <div class="form-group">
                <div class="modal-footer">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" id="validasiform" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
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
    <script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script>
      $(function () {
        $('#example1').DataTable({
          "order": [[ 0, "desc" ]],
        });
      });
    </script>
    <script>
      $(function() {
        $("#validasiform").click(function (event) {
            if (document.getElementById('ri').value === '') {
              swal({
                title: "Anggaran RI Harus Diisi!",
                type: "warning",
                allowOutsideClick: true, 
              });
              return false;
            }
            else if (document.getElementById('op').value === '') {
              swal({
                title: "Anggaran OP Harus Diisi!",
                type: "warning", 
                allowOutsideClick: true,
              });
              return false;
            }
            else if (document.getElementById('nominal').value === '') {
              swal({
                title: "Total Anggaran Harus Diisi!",
                type: "warning",
                allowOutsideClick: true, 
              });
              return false;
            }
        });
      });
    </script>
    <script>
      function calc()
      {
        var elm = document.forms["anggarantahunan"];
        elm["nominal"].value = parseInt(elm["ri"].value) + parseInt(elm["op"].value);
      }
    </script>
    <script>
      var mulai = 2017
      var min = new Date().getFullYear(),
      max = min + 9,
      select = document.getElementById('pilihtahun');

      for (var i = mulai; i<=max; i++){
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.appendChild(opt);
      }
    </script>
    @foreach($anggaranscript as $anggaranscript)
    <script>
      $(function() {
        $("#validasiformedit{{$anggaranscript->id}}").click(function (event) {
            if (document.getElementById('riEdit{{$anggaranscript->id}}').value === '') {
              swal({
                title: "Anggaran RI Harus Diisi!",
                type: "warning",
                allowOutsideClick: true, 
              });
              return false;
            }
            else if (document.getElementById('opEdit{{$anggaranscript->id}}').value === '') {
              swal({
                title: "Anggaran OP Harus Diisi!",
                type: "warning", 
                allowOutsideClick: true,
              });
              return false;
            }
            else if (document.getElementById('nominalEdit{{$anggaranscript->id}}').value === '') {
              swal({
                title: "Total Anggaran Harus Diisi!",
                type: "warning",
                allowOutsideClick: true, 
              });
              return false;
            }
        });
      });
    </script>
    <script>
      $(document).ready(function(){
          $("#anggarantahunanedit{{$anggaranscript->id}}").keyup(function(){
              var val1 = +$("#riEdit{{$anggaranscript->id}}").val();
              var val2 = +$("#opEdit{{$anggaranscript->id}}").val();
              $("#nominalEdit{{$anggaranscript->id}}").val(val1+val2);
         });
      });
    </script>
    @endforeach
  </body>
  </html>
