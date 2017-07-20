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
          <a href="{{url('')}}/report-anggaran-tahunan">Pertahun</a> \ <a href="{{url('')}}/report-anggaran-bulanan/{{$tahun_anggar}}">Perbulan {{$tahun_anggar}}</a> \ Anggaran Rinci Bulan {{$namabulan}} {{$tahun_anggar}}
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
                <div class="col-md-7">
                  <button class="btn btn-primary" style="font-weight: bold;" data-toggle="modal" data-target="#myModal2">Pencairan Baru</button>
                </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Proyek</th>
                      <th>Tanggal</th>
                      <th>Kategori</th>
                      <th>Nominal</th>
                      <th>Keterangan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($pengeluaran_rinci as $pengeluaran_rinci)
                    <tr>
                      <td>{{is_null($pengeluaran_rinci->proyek) ? "-" : $pengeluaran_rinci->proyek}}</td>
                      <td>{{date('d F Y',strtotime($pengeluaran_rinci->tanggal_pencairan))}}</td>
                      <td>{{$pengeluaran_rinci->kategori}}</td>
                      <td>Rp. {{number_format($pengeluaran_rinci->nominal, 0, ',', '.')}}</td>
                      <td>{{$pengeluaran_rinci->keterangan}}</td>
                      <td align="center" 'white-space: nowrap'>
                        <button class="btn btn-default" data-toggle="modal" data-target="#editpengeluaran{{$pengeluaran_rinci->id}}">Edit</button>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <center><a href="{{url('')}}/download-anggaran-rinci/{{$tahun_anggar}}/{{$bulan}}"><button class="btn btn-success" style="font-weight: bold;">Download Laporan</button></a></center>
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

  @foreach($pengeluaran_rinci_edit as $pengeluaran_rinci_edit)
    <div class="modal fade" id="editpengeluaran{{$pengeluaran_rinci_edit->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Edit Pencairan</h3></center>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" name="pencairanedit{{$pengeluaran_rinci_edit->id}}" id="pencairanedit{{$pengeluaran_rinci_edit->id}}" method="POST" action="">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Tanggal</label>
                <div class="col-md-9">
                  <input type="date" class="form-control pull-right" id="tanggaledit{{$pengeluaran_rinci_edit->id}}" name="tanggaledit" value="{{$pengeluaran_rinci_edit->tanggal_pencairan}}">
                </div>
              </div>
              <!--Kategori-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Kategori</label>
                <div class="col-md-9">
                  <select class="form-control" name="kategoriedit" id="kategoriedit{{$pengeluaran_rinci_edit->id}}" value="{{$pengeluaran_rinci_edit->kategori}}">
                    <option value="RI">RI</option>
                    <option value="AO">AO</option>                 
                  </select>
                </div>
              </div>
              <!--Proyek-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Proyek</label>
                <div class="col-md-9">
                  <select class="form-control" name="proyek" id="proyek" autofocus>
                    <option value="">Bukan proyek</option>
                    @foreach($proyekEdit as $data)
                      <option value="{{$data->nama}}" {{$data->nama == $pengeluaran_rinci_edit->proyek ? "selected" : ""}}>{{$data->nama}}</option>
                    @endforeach             
                  </select>
                </div>
              </div>
              <!--Nominal-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Nominal</label>
                <div class="col-md-9">
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input name="nominaledit" type="number" class="form-control" id="nominaledit{{$pengeluaran_rinci_edit->id}}" value="{{$pengeluaran_rinci_edit->nominal}}">
                </div>
                </div>
              </div>
              <!--Keterangan-->
              <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Keterangan</label>
                <div class="col-md-9">
                  <textarea name="keteranganedit" type="text" class="form-control" id="keteranganedit{{$pengeluaran_rinci_edit->id}}">{{$pengeluaran_rinci_edit->keterangan}}</textarea>
                </div>
              </div>
              <input name="idpencairan" type="hidden" class="form-control" id="idpencairan{{$pengeluaran_rinci_edit->id}}" value="{{$pengeluaran_rinci_edit->id}}">
              <!-- /.box-body -->
              <div class="form-group">
                <div class="modal-footer">
                  <button type="reset" class="btn btn-danger">Cancel</button>
                  <button type="submit" id="validasieditpencairan{{$pengeluaran_rinci_edit->id}}" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Tambah Pencairan</h3></center>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{url('')}}/input-pencairan-anggaran">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="inputEmail3" class="col-md-3 control-label">Tanggal</label>
              <div class="col-md-9">
                <input type="date" class="form-control pull-right" id="tanggal" name="tanggal">
              </div>
            </div>
            <!--Kategori-->
            <div class="form-group">
              <label for="inputEmail3" class="col-md-3 control-label">Kategori</label>
              <div class="col-md-9">
                <select class="form-control" name="kategori" id="kategori">
                  <option value="RI">RI</option>
                  <option value="AO">AO</option>                 
                </select>
              </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-md-3 control-label">Proyek</label>
                <div class="col-md-9">
                  <select class="form-control" name="proyek" id="proyek" autofocus>
                    <option value="">Bukan proyek</option>
                    @foreach($proyek as $data)
                      <option value="{{$data->nama}}">{{$data->nama}}</option>
                    @endforeach             
                  </select>
                </div>
              </div>
            <!--Nominal-->
            <div class="form-group">
              <label for="inputEmail3" class="col-md-3 control-label">Nominal</label>
              <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-addon">Rp</span>
                <input name="nominal" type="number" class="form-control" id="nominal">
              </div>
              </div>
            </div>
            <!--Keterangan-->
            <div class="form-group">
              <label for="inputEmail3" class="col-md-3 control-label">Keterangan</label>
              <div class="col-md-9">
                <textarea name="keterangan" type="text" class="form-control" id="keterangan"></textarea>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="form-group">
              <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" id="validasipencairan" class="btn btn-primary">Submit</button>
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
<script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
<script>
  $(function() {
    $("#validasipencairan").click(function (event) {
        if (document.getElementById('tanggal').value === '') {
          swal({
            title: "Tanggal Pencairan Harus Diisi!",
            type: "warning",
            allowOutsideClick: true, 
          });
          return false;
        }
        else if (document.getElementById('kategori').value === '') {
          swal({
            title: "Kategori Pencairan Harus Diisi!",
            type: "warning", 
            allowOutsideClick: true,
          });
          return false;
        }
        else if (document.getElementById('nominal').value === '') {
          swal({
            title: "Nominal Pencairan Harus Diisi!",
            type: "warning",
            allowOutsideClick: true, 
          });
          return false;
        }
        else if (document.getElementById('keterangan').value === '') {
          swal({
            title: "Keterangan Pencairan Harus Diisi!",
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
    $('#example1').DataTable({
      "order": [[ 0, "desc" ]],
      "autoWidth": true
    });
  });
</script>
@foreach($pengeluaran_rinci_modal as $pengeluaran_rinci_modal)
<script>
  $(function() {
    $("#validasieditpencairan{{$pengeluaran_rinci_modal->id}}").click(function (event) {
        if (document.getElementById('tanggaledit{{$pengeluaran_rinci_modal->id}}').value === '') {
          swal({
            title: "Tanggal Pencairan Harus Diisi!",
            type: "warning",
            allowOutsideClick: true, 
          });
          return false;
        }
        else if (document.getElementById('kategoriedit{{$pengeluaran_rinci_modal->id}}').value === '') {
          swal({
            title: "Kategori Pencairan Harus Diisi!",
            type: "warning", 
            allowOutsideClick: true,
          });
          return false;
        }
        else if (document.getElementById('nominaledit{{$pengeluaran_rinci_modal->id}}').value === '') {
          swal({
            title: "Nominal Pencairan Harus Diisi!",
            type: "warning",
            allowOutsideClick: true, 
          });
          return false;
        }
        else if (document.getElementById('keteranganedit{{$pengeluaran_rinci_modal->id}}').value === '') {
          swal({
            title: "Keterangan Pencairan Harus Diisi!",
            type: "warning",
            allowOutsideClick: true, 
          });
          return false;
        }
    });
  });
</script>
@endforeach
</body>
</html>
