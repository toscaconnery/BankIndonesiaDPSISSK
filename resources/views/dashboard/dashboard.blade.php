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
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('')}}/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" type="text/css" href="{{url('')}}/sweetalert/dist/sweetalert.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{url('')}}/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
        </ol>
      </section>

      <!--Anggaran-->
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <a href="{{url('')}}/report-anggaran-tahunan"><h2 class="box-title">Anggaran</h2></a>
            <!-- <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div> -->
          </div>
          <div class="box-body">
            <div class="col-sm-3">
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Forecast</h3>
                  @if($forecast >= 0)
                  <p>Bersisa Rp {{number_format($forecast, 0, ",", ".")}}</p>
                  @elseif($forecast < 0)
                  @php
                  $forecast = $forecast * (-1);
                  @endphp
                  <p>Kekurangan Rp {{number_format($forecast, 0, ",", ".")}}</p>
                  @endif
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Budget</h3>
                  <p>RI : Rp {{$anggaranada!=0 ? number_format($anggaran[0]->ri, 0, ',', '.') : 0}}</p>
                  <p>AO : Rp {{$anggaranada!=0 ? number_format($anggaran[0]->ao, 0, ',', '.') : 0}}</p>

                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>Rest</h3>

                  <p>RI : Rp {{$anggaranada!=0 ? number_format($anggaran[0]->sisa_ri, 0, ',', '.') : 0}}</p>
                  <p>AO : Rp {{$anggaranada!=0 ? number_format($anggaran[0]->sisa_ao, 0, ',', '.') : 0}}</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
              </div>
            </div>
            <div class="col-sm-9">
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
          </div>
        </div>
        <!-- /.box -->
      </div>

      <!--Project-->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="{{url('')}}/list-proyek"><h2 class="box-title">Project</h2></a>
          </div>
          <!-- /.box-header -->
          <!-- content start -->
          <div class="box-body">
            <!--Content Project Progress-->
            <div style="overflow-y: scroll; height: 30em">
            <!-- bawah ini aku kasihin if FAISHAL-->
            @if(isset($kelengkapanProyek))
            
              @foreach($kelengkapanProyek as $data)
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number">{{$data['nama']}}</span>
                  <span class="info-box-number">Progress : {{number_format($data['persenTotal'], 2, ",", ".")}}%</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: {{$data['persenTotal']}}%"></div>
                  </div>
                  <span class="progress-description">
                    Current step : {{$data['lastProgress']}} ({{$data['persenLastProgress']}}%)
                    <div class="pull-right">{{$data['deadlineProgress']}}</div>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              @endforeach
            
            @else
            
              halo
            
            @endif
            </div>
          </div>
        </div>
        <!-- /.box -->
      </div>

      <!--Issue-->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <a href="{{url('')}}/list-issue"><h2 class="box-title">Issue</h2></a>
          </div>
          <!-- /.box-header -->
          <!-- content start -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <div style="overflow-y: scroll; height: 30em">
                  <ul class="timeline">
                    <li class="time-label">
                      <span class="bg-blue">
                        Issue yang perlu diperhatikan
                      </span>
                    </li>
                    <!--list issue-->
                    @if($issue)
                    @foreach($issue as $issue)
                    <li>
                      <i class="fa fa-info bg-blue"></i>
                      <!--issue content goes here-->
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <a href="#">
                            <big>
                              {{$issue->judul}}
                            </big>
                          </a>
                        </h3>

                        <div class="timeline-body">
                          {{$issue->isi}}
                        </div>

                        @if($issue->tindak_lanjut)
                        <div class="timeline-body">
                          <big>
                            <b>Tindak Lanjut:</b>
                          </big>
                          <br>
                          {{$issue->tindak_lanjut}}
                        </div>
                        @endif

                        <div class="timeline-body">
                          <small>
                            <cite>
                              {{ $issue->pic }}
                            </cite>
                          </small>
                        </div>
                        <div class="timeline-footer">
                          <a href="{{url('')}}/edit-issue/{{$issue->id}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                          <!-- <a class="btn btn-primary btn-xs">Informasi</a> -->
                          @if($issue->status == 'Finish')
                          <a class="btn btn-success btn-xs">Finish</a>
                          @elseif($issue->status == 'On Progress')
                          <a class="btn btn-info btn-xs">On Progress</a>
                          @elseif($issue->status == 'Pending')
                          <a class="btn btn-warning btn-xs">Pending</a>
                          @else
                          <a class="btn btn-primary">{{$issue->status}}</a>
                          @endif
                          <span class="time pull-right"><i class="fa fa-clock-o"></i> 
                            {{ $issue->created_at }}
                          </span>
                        </div>
                      </div>
                    </li>
                    @endforeach
                    @else
                    <li>
                      <i class="fa fa-info bg-blue"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header">
                          <big>
                            Tidak ada issue.
                          </big>
                        </h3>
                      </div>
                    </li>
                    @endif
                  </ul>
                </div>
                <a href="{{url('')}}/list-all-issue" class="btn btn-primary">Tampilkan Semua</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>
@include('layouts.footer')
</div>

<script src="{{url('')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('')}}/bootstrap2/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{url('')}}/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="{{url('')}}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('')}}/dist/js/demo.js"></script>
<!-- page script -->
<script src="{{url('')}}/js/highchart.js"></script>
<script src="{{url('')}}/js/exporting.js"></script>
<script src="{{url('')}}/js/offline.js"></script>
<script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
<script>
  Highcharts.chart('container', {
    chart: {
      type: 'column'
    },
    title: {
      text: 'Grafik Anggaran {{$anggaranada!=0 ? $anggaran[0]->tahun : '-'}}'
    },
    xAxis: {
      categories: [
      'Januari',
      'Februari',
      'Maret',
      'April',
      'Mei',
      'Juni',
      'Juli',
      'Agustus',
      'September',
      'Oktober',
      'November',
      'Desember'
      ],
      crosshair: true
    },
    yAxis: {
      min: 0,
      title: {
        text: 'Anggaran (Rp)'
      }
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name} : </td>' +
          '<td style="padding:0"><b>Rp {point.y}</b></td></tr>',
      footerFormat: '</table>',
      shared: true,
      useHTML: true
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0
      }
    },
    series: [{
      name: 'RI',
      data: 
      [
      {{isset($januariRI->sumri) ? $januariRI->sumri : 0 }}, 
      {{isset($februariRI->sumri) ? $februariRI->sumri : 0 }}, 
      {{isset($maretRI->sumri) ? $maretRI->sumri : 0 }}, 
      {{isset($aprilRI->sumri) ? $aprilRI->sumri : 0 }}, 
      {{isset($meiRI->sumri) ? $meiRI->sumri : 0 }},  
      {{isset($juniRI->sumri) ? $juniRI->sumri : 0 }}, 
      {{isset($juliRI->sumri) ? $juliRI->sumri : 0 }}, 
      {{isset($agustusRI->sumri) ? $agustusRI->sumri : 0 }},
      {{isset($septemberRI->sumri) ? $septemberRI->sumri : 0 }},
      {{isset($oktoberRI->sumri) ? $oktoberRI->sumri : 0 }},
      {{isset($novemberRI->sumri) ? $novemberRI->sumri : 0 }},
      {{isset($desemberRI->sumri) ? $desemberRI->sumri : 0 }} 
      ]
    }, {
      name: 'AO',
      data:
      [
      {{isset($januariAO->sumao) ? $januariAO->sumao : 0 }}, 
      {{isset($februariAO->sumao) ? $februariAO->sumao : 0 }}, 
      {{isset($maretAO->sumao) ? $maretAO->sumao : 0 }}, 
      {{isset($aprilAO->sumao) ? $aprilAO->sumao : 0 }}, 
      {{isset($meiAO->sumao) ? $meiAO->sumao : 0 }},  
      {{isset($juniAO->sumao) ? $juniAO->sumao : 0 }}, 
      {{isset($juliAO->sumao) ? $juliAO->sumao : 0 }}, 
      {{isset($agustusAO->sumao) ? $agustusAO->sumao : 0 }},
      {{isset($septemberAO->sumao) ? $septemberAO->sumao : 0 }},
      {{isset($oktoberAO->sumao) ? $oktoberAO->sumao : 0 }},
      {{isset($novemberAO->sumao) ? $novemberAO->sumao : 0 }},
      {{isset($desemberAO->sumao) ? $desemberAO->sumao : 0 }}  
      ]
    }]
  });
</script>
</body>
</html>
