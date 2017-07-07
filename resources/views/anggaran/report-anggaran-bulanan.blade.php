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

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Pencairan Anggaran {{$tahun_anggaran}}
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
                    <!-- @foreach($jlh_pengeluaran_bulanan as $jlh_pengeluaran_bulanan)
                    <tr>
                      <td>{{$i++}}</td>
                      <td>{{$jlh_pengeluaran_bulanan->Bulan}}</td>
                      <td>Rp {{number_format ($jlh_pengeluaran_bulanan->sumri)}}</td>
                      <td>100%</td>
                      <td>Rp {{number_format ($jlh_pengeluaran_bulanan->sumop)}}</td>
                      <td>90%</td>
                      <td>Rp {{number_format ($jlh_pengeluaran_bulanan->sumtot)}}</td>
                      <td>95%</td>
                      <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/{{$jlh_pengeluaran_bulanan->idbulan}}">{{$jlh_pengeluaran_bulanan->Jumlah}}</a></td>
                    </tr>
                    @endforeach -->
                <tr>
                  <td>1</td>
                  <td>Januari</td>
                  <td>Rp {{isset($januariRI->sumri) ? number_format($januariRI->sumri) : 0 }}</td>
                  <td>{{isset($januariRI->sumri) ? $persenjanuariRI : 0 }} %</td>
                  <td>Rp {{isset($januariOP->sumop) ? number_format($januariOP->sumop) : 0}}</td>
                  <td>{{isset($januariOP->sumop) ? $persenjanuariOP : 0 }} %</td>
                  <td>Rp {{number_format($totaljanuari)}}</td>
                  <td>{{$totaljanuari!=0 ? $persenttljanuari : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/1">{{$totaljanuari!=0 ? $nominal[0]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Februari</td>
                  <td>Rp {{isset($februariRI->sumri) ? number_format($februariRI->sumri) : 0 }}</td>
                  <td>{{isset($februariRI->sumri) ? $persenfebruariRI : 0 }} %</td>
                  <td>Rp {{isset($februariOP->sumop) ? number_format($februariOP->sumop) : 0}}</td>
                  <td>{{isset($februariOP->sumop) ? $persenfebruariOP : 0 }} %</td>
                  <td>Rp {{number_format($totalfebruari)}}</td>
                  <td>{{$totalfebruari!=0 ? $persenttlfebruari : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/2">{{$totalfebruari!=0 ? $nominal[1]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Maret</td>
                  <td>Rp {{isset($maretRI->sumri) ? number_format($maretRI->sumri) : 0 }}</td>
                  <td>{{isset($maretRI->sumri) ? $persenmaretRI : 0 }} %</td>
                  <td>Rp {{isset($maretOP->sumop) ? number_format($maretOP->sumop) : 0}}</td>
                  <td>{{isset($maretOP->sumop) ? $persenmaretOP : 0 }} %</td>
                  <td>Rp {{number_format($totalmaret)}}</td>
                  <td>{{$totalmaret!=0 ? $persenttlmaret : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/3">{{$totalmaret!=0 ? $nominal[2]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>April</td>
                  <td>Rp {{isset($aprilRI->sumri) ? number_format($aprilRI->sumri) : 0 }}</td>
                  <td>{{isset($aprilRI->sumri) ? $persenaprilRI : 0 }} %</td>
                  <td>Rp {{isset($aprilOP->sumop) ? number_format($aprilOP->sumop) : 0}}</td>
                  <td>{{isset($aprilOP->sumop) ? $persenaprilOP : 0 }} %</td>
                  <td>Rp {{number_format($totalapril)}}</td>
                  <td>{{$totalapril!=0 ? $persenttlapril : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/4">{{$totalapril!=0 ? $nominal[3]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Mei</td>
                  <td>Rp {{isset($meiRI->sumri) ? number_format($meiRI->sumri) : 0 }}</td>
                  <td>{{isset($meiRI->sumri) ? $persenmeiRI : 0 }} %</td>
                  <td>Rp {{isset($meiOP->sumop) ? number_format($meiOP->sumop) : 0}}</td>
                  <td>{{isset($meiOP->sumop) ? $persenmeiOP : 0 }} %</td>
                  <td>Rp {{number_format($totalmei)}}</td>
                  <td>{{$totalmei!=0 ? $persenttlmei : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/5">{{$totalmei!=0 ? $nominal[4]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Juni</td>
                  <td>Rp {{isset($juniRI->sumri) ? number_format($juniRI->sumri) : 0 }}</td>
                  <td>{{isset($juniRI->sumri) ? $persenjuniRI : 0 }} %</td>
                  <td>Rp {{isset($juniOP->sumop) ? number_format($juniOP->sumop) : 0}}</td>
                  <td>{{isset($juniOP->sumop) ? $persenjuniOP : 0 }} %</td>
                  <td>Rp {{number_format($totaljuni)}}</td>
                  <td>{{$totaljuni!=0 ? $persenttljuni : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/6">{{$totaljuni!=0 ? $nominal[5]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Juli</td>
                  <td>Rp {{isset($juliRI->sumri) ? number_format($juliRI->sumri) : 0 }}</td>
                  <td>{{isset($juliRI->sumri) ? $persenjuliRI : 0 }} %</td>
                  <td>Rp {{isset($juliOP->sumop) ? number_format($juliOP->sumop) : 0}}</td>
                  <td>{{isset($juliOP->sumop) ? $persenjuliOP : 0 }} %</td>
                  <td>Rp {{number_format($totaljuli)}}</td>
                  <td>{{$totaljuli!=0 ? $persenttljuli : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/7">{{$totaljuli!=0 ? $nominal[6]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Agustus</td>
                  <td>Rp {{isset($agustusRI->sumri) ? number_format($agustusRI->sumri) : 0 }}</td>
                  <td>{{isset($agustusRI->sumri) ? $persenagustusRI : 0 }} %</td>
                  <td>Rp {{isset($agustusOP->sumop) ? number_format($agustusOP->sumop) : 0}}</td>
                  <td>{{isset($agustusOP->sumop) ? $persenagustusOP : 0 }} %</td>
                  <td>Rp {{number_format($totalagustus)}}</td>
                  <td>{{$totalagustus!=0 ? $persenttlagustus : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/8">{{$totalagustus!=0 ? $nominal[7]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>September</td>
                  <td>Rp {{isset($septemberRI->sumri) ? number_format($septemberRI->sumri) : 0 }}</td>
                  <td>{{isset($septemberRI->sumri) ? $persenseptemberRI : 0 }} %</td>
                  <td>Rp {{isset($septemberOP->sumop) ? number_format($septemberOP->sumop) : 0}}</td>
                  <td>{{isset($septemberOP->sumop) ? $persenseptemberOP : 0 }} %</td>
                  <td>Rp {{number_format($totalseptember)}}</td>
                  <td>{{$totalseptember!=0 ? $persenttlseptember : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/9">{{$totalseptember!=0 ? $nominal[8]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>Oktober</td>
                  <td>Rp {{isset($oktoberRI->sumri) ? number_format($oktoberRI->sumri) : 0 }}</td>
                  <td>{{isset($oktoberRI->sumri) ? $persenoktoberRI : 0 }} %</td>
                  <td>Rp {{isset($oktoberOP->sumop) ? number_format($oktoberOP->sumop) : 0}}</td>
                  <td>{{isset($oktoberOP->sumop) ? $persenoktoberOP : 0 }} %</td>
                  <td>Rp {{number_format($totaloktober)}}</td>
                  <td>{{$totaloktober!=0 ? $persenttloktober : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/10">{{$totaloktober!=0 ? $nominal[9]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>November</td>
                  <td>Rp {{isset($novemberRI->sumri) ? number_format($novemberRI->sumri) : 0 }}</td>
                  <td>{{isset($novemberRI->sumri) ? $persennovemberRI : 0 }} %</td>
                  <td>Rp {{isset($novemberOP->sumop) ? number_format($novemberOP->sumop) : 0}}</td>
                  <td>{{isset($novemberOP->sumop) ? $persennovemberOP : 0 }} %</td>
                  <td>Rp {{number_format($totalnovember)}}</td>
                  <td>{{$totalnovember!=0 ? $persenttlnovember : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/11">{{$totalnovember!=0 ? $nominal[10]->Jumlah : 0}}</a></td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>Desember</td>
                  <td>Rp {{isset($desemberRI->sumri) ? number_format($desemberRI->sumri) : 0 }}</td>
                  <td>{{isset($desemberRI->sumri) ? $persendesemberRI : 0 }} %</td>
                  <td>Rp {{isset($desemberOP->sumop) ? number_format($desemberOP->sumop) : 0}}</td>
                  <td>{{isset($desemberOP->sumop) ? $persendesemberOP : 0 }} %</td>
                  <td>Rp {{number_format($totaldesember)}}</td>
                  <td>{{$totaldesember!=0 ? $persenttldesember : 0}} %</td>
                  <td><a href="{{url('')}}/report-anggaran-rinci/{{$tahun_anggaran}}/12">{{$totaldesember!=0 ? $nominal[11]->Jumlah : 0}}</a></td>
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
