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
          Anggaran Rinci Bulan Januari 2017
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
                <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Kategori</th>
                  <th>Nominal</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>2 Juli 2017</td>
                  <td>OP</td>
                  <td>Rp. 234.234.242</td>
                  <td>Dianggarkan untuk proyek APIK</td>
                </tr>
                <tr>
                  <td>4 Juli 2017</td>
                  <td>RI</td>
                  <td>Rp. 230.234.242</td>
                  <td>Dianggarkan untuk desain proyek APIK</td>
                </tr>
              </tbody>
            </table>
            <center><button class="btn btn-default" style="font-weight: bold;" data-toggle="modal" data-target="#myModal2">Tambah Pengeluaran</button></center>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Tambah Pengeluaran</h3></center>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" method="POST">
                          <div class="box-body">

                            {{ csrf_field() }}

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                              <div class="col-sm-9">
                                <input type="date" class="form-control pull-right" id="datepicker">
                                
                              </div>
                            </div>

                            <!--Kategori-->
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>
                              <div class="col-sm-9">
                                <select class="form-control">
                                  <option>RI</option>
                                  <option>OP</option>                 
                                </select>
                              </div>
                            </div>

                            <!--Nominal-->
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-3 control-label">Nominal</label>
                              <div class="col-sm-9">
                                <input name="pic" type="number" class="form-control" id="inputEmail3">
                              </div>
                            </div>

                            <!--Keterangan-->
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-3 control-label">Keterangan</label>
                              <div class="col-sm-9">
                                <textarea name="pic" type="text" class="form-control" id="inputEmail3"></textarea>
                              </div>
                            </div>

                          </div>
                          <!-- /.box-body -->
                          <div class="form-group">
                            <div class="modal-footer">
                              <button type="reset" class="btn btn-default">Reset</button>
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
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
</body>
</html>
