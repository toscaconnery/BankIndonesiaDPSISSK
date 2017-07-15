<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI PMO&RMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('')}}/bootstrap2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/morris/morris.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="{{url('')}}/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="{{url('')}}/sweetalert/dist/sweetalert.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Pencairan Anggaran Tahun {{$tahun_anggaran}}
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('')}}/report-anggaran-tahunan"><i class="fa fa-money"></i> Anggaran</a></li>
        </ol>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-7">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h2 class="box-title">Pencairan</h2>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-7">
                    <button class="btn btn-primary" style="font-weight: bold;" data-toggle="modal" data-target="#myModal2">Pencairan Baru</button>
                  </div>
                </div>
                <br>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">Bulan</th>
                      <th colspan="6">Nominal Dikeluarkan</th>
                      <th rowspan="2">Rincian</th>
                    </tr>
                    <tr>
                      <th colspan="2">RI</th>
                      <th colspan="2">OP</th>
                      <th colspan="2">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i=1;
                    @endphp
                    <tr>
                      <td>1</td>
                      <td>Januari</td>
                      <td>Rp {{isset($januariRI->sumri) ? number_format($januariRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($januariRI->sumri) ? round($persenjanuariRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($januariOP->sumop) ? number_format($januariOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($januariOP->sumop) ? round($persenjanuariOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totaljanuari, 0, ',', '.')}}</td>
                      <td>{{$totaljanuari==0 ? '-' : round($persenttljanuari,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/1">{{$jlhpengeluaranjanuari}}</a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Februari</td>
                      <td>Rp {{isset($februariRI->sumri) ? number_format($februariRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($februariRI->sumri) ? round($persenfebruariRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($februariOP->sumop) ? number_format($februariOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($februariOP->sumop) ? round($persenfebruariOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totalfebruari, 0, ',', '.')}}</td>
                      <td>{{$totalfebruari==0 ? '-' : round($persenttlfebruari,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/2">{{$jlhpengeluaranfebruari}}</a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Maret</td>
                      <td>Rp {{isset($maretRI->sumri) ? number_format($maretRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($maretRI->sumri) ? round($persenmaretRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($maretOP->sumop) ? number_format($maretOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($maretOP->sumop) ? round($persenmaretOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totalmaret, 0, ',', '.')}}</td>
                      <td>{{$totalmaret==0 ? '-' : round($persenttlmaret,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/3">{{$jlhpengeluaranmaret}}</a></td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>April</td>
                      <td>Rp {{isset($aprilRI->sumri) ? number_format($aprilRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($aprilRI->sumri) ? round($persenaprilRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($aprilOP->sumop) ? number_format($aprilOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($aprilOP->sumop) ? round($persenaprilOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totalapril, 0, ',', '.')}}</td>
                      <td>{{$totalapril==0 ? '-' : round($persenttlapril,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/4">{{$jlhpengeluaranapril}}</a></td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>Mei</td>
                      <td>Rp {{isset($meiRI->sumri) ? number_format($meiRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($meiRI->sumri) ? round($persenmeiRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($meiOP->sumop) ? number_format($meiOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($meiOP->sumop) ? round($persenmeiOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totalmei, 0, ',', '.')}}</td>
                      <td>{{$totalmei==0 ? '-' : round($persenttlmei,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/5">{{$jlhpengeluaranmei}}</a></td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>Juni</td>
                      <td>Rp {{isset($juniRI->sumri) ? number_format($juniRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($juniRI->sumri) ? round($persenjuniRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($juniOP->sumop) ? number_format($juniOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($juniOP->sumop) ? round($persenjuniOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totaljuni, 0, ',', '.')}}</td>
                      <td>{{$totaljuni==0 ? '-' : round($persenttljuni,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/6">{{$jlhpengeluaranjuni}}</a></td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>Juli</td>
                      <td>Rp {{isset($juliRI->sumri) ? number_format($juliRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($juliRI->sumri) ? round($persenjuliRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($juliOP->sumop) ? number_format($juliOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($juliOP->sumop) ? round($persenjuliOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totaljuli, 0, ',', '.')}}</td>
                      <td>{{$totaljuli==0 ? '-' : round($persenttljuli,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/7">{{$jlhpengeluaranjuli}}</a></td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>Agustus</td>
                      <td>Rp {{isset($agustusRI->sumri) ? number_format($agustusRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($agustusRI->sumri) ? round($persenagustusRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($agustusOP->sumop) ? number_format($agustusOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($agustusOP->sumop) ? round($persenagustusOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totalagustus, 0, ',', '.')}}</td>
                      <td>{{$totalagustus==0 ? '-' : round($persenttlagustus,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/8">{{$jlhpengeluaranagustus}}</a></td>
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>September</td>
                      <td>Rp {{isset($septemberRI->sumri) ? number_format($septemberRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($septemberRI->sumri) ? round($persenseptemberRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($septemberOP->sumop) ? number_format($septemberOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($septemberOP->sumop) ? round($persenseptemberOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totalseptember, 0, ',', '.')}}</td>
                      <td>{{$totalseptember==0 ? '-' : round($persenttlseptember,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/9">{{$jlhpengeluaranseptember}}</a></td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>Oktober</td>
                      <td>Rp {{isset($oktoberRI->sumri) ? number_format($oktoberRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($oktoberRI->sumri) ? round($persenoktoberRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($oktoberOP->sumop) ? number_format($oktoberOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($oktoberOP->sumop) ? round($persenoktoberOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totaloktober, 0, ',', '.')}}</td>
                      <td>{{$totaloktober==0 ? '-' : round($persenttloktober,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/10">{{$jlhpengeluaranoktober}}</a></td>
                    </tr>
                    <tr>
                      <td>11</td>
                      <td>November</td>
                      <td>Rp {{isset($novemberRI->sumri) ? number_format($novemberRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($novemberRI->sumri) ? round($persennovemberRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($novemberOP->sumop) ? number_format($novemberOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($novemberOP->sumop) ? round($persennovemberOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totalnovember, 0, ',', '.')}}</td>
                      <td>{{$totalnovember==0 ? '-' : round($persenttlnovember,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/11">{{$jlhpengeluarannovember}}</a></td>
                    </tr>
                    <tr>
                      <td>12</td>
                      <td>Desember</td>
                      <td>Rp {{isset($desemberRI->sumri) ? number_format($desemberRI->sumri, 0, ',', '.') : 0 }}</td>
                      <td>{{isset($desemberRI->sumri) ? round($persendesemberRI,2).' %' : '-' }}</td>
                      <td>Rp {{isset($desemberOP->sumop) ? number_format($desemberOP->sumop, 0, ',', '.') : 0}}</td>
                      <td>{{isset($desemberOP->sumop) ? round($persendesemberOP,2).' %' : '-' }}</td>
                      <td>Rp {{number_format($totaldesember, 0, ',', '.')}}</td>
                      <td>{{$totaldesember==0 ? '-' : round($persenttldesember,2).' %'}}</td>
                      <td align="center"><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/12">{{$jlhpengeluarandesember}}</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        </div>
      </section>
    </div>
    @include('layouts.footer')
  </div>

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
                <div class="input-group">
                  <span class="input-group-addon">Rp</span>
                  <input name="nominal" type="text" class="form-control" id="nominal">
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
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="{{url('')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script>$.widget.bridge('uibutton', $.ui.button);</script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{url('')}}/bootstrap2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="{{url('')}}/plugins/morris/morris.min.js"></script>
  <script src="{{url('')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
  <script src="{{url('')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="{{url('')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="{{url('')}}/plugins/knob/jquery.knob.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
  <script src="{{url('')}}/plugins/daterangepicker/daterangepicker.js"></script>
  <script src="{{url('')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="{{url('')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <script src="{{url('')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="{{url('')}}/plugins/fastclick/fastclick.js"></script>
  <script src="{{url('')}}/dist/js/app.min.js"></script>
  <script src="{{url('')}}/dist/js/pages/dashboard.js"></script>
  <script src="{{url('')}}/dist/js/demo.js"></script>
  <script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="{{url('')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
  <script>
    $(function () {

      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "info": true,
        "autoWidth": false
      });
    });
  </script>
</body>
</html>
