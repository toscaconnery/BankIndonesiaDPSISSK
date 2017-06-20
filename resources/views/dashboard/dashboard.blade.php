<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI PMO&RMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="chart">
              <canvas id="barchart" style="height:230px"></canvas>
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

            <div class="info-box bg-aqua">
              <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Project APIK</span>
                <span class="info-box-number">Progress : 40%</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 40%"></div>
                </div>
                    <span class="progress-description">
                      Current step : Perancangan (15%)
                      <div class="pull-right">16 Juli 2017</div>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>

            

            <div class="info-box bg-aqua">
              <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Project SIMKU</span>
                <span class="info-box-number">Progress : 56%</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 56%"></div>
                </div>
                    <span class="progress-description">
                      Current step : Pembuatan program (36%)
                      <div class="pull-right">25 Nopember 2017</div>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>

            <div class="info-box bg-aqua">
              <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Project GWN Averaging</span>
                <span class="info-box-number">Progress : 90%</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 90%"></div>
                </div>
                    <span class="progress-description">
                      Current step : Implementasi (24%)
                      <div class="pull-right">14 Desember 2017</div>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>

            <div class="info-box bg-aqua">
              <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>
              <div class="info-box-content">
                <span class="info-box-number">Project APIK</span>
                <span class="info-box-number">Progress : 100%</span>
                <div class="progress">
                  <div class="progress-bar" style="width: 100%"></div>
                </div>
                    <span class="progress-description">
                      Current step : Finished
                      <div class="pull-right">11 Agustus 2017</div>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>


          </div>
        </div>
        <!-- /.box -->
      </div>

      <!--Issue-->
      <div class="col-sm-6">
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
                <ul class="timeline">
                  <li class="time-label">
                    <span class="bg-blue">
                      Issue yang perlu diperhatikan
                    </span>
                  </li>
                  <!--list issue-->
                  <li>
                    <i class="fa fa-info bg-blue"></i>
                    <!--issue content goes here-->
                    <div class="timeline-item">
                      <h3 class="timeline-header">
                        <a href="#">
                          <big>
                            Issue Sistem Keuangan
                          </big>

                        </a>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="{{url('')}}/edit-issue" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-success btn-xs">Finish</a>
                        <span class="time pull-right"><i class="fa fa-clock-o"></i> 28 Juli 12:05</span>
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-info bg-blue"></i>
                    <!--issue content goes here-->
                    <div class="timeline-item">
                      <h3 class="timeline-header">
                        <a href="#">
                          <big>
                            Issue Pembaruan Sistem
                          </big>
                        </a>
                        <button type="button" class="close">
                          <small><span aria-hidden="true"><i class="fa fa-remove"></i></span></small>
                        </button>
                        
                      </h3>
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="{{url('')}}/edit-issue" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-warning btn-xs">On Progress</a>
                        <span class="time pull-right"><i class="fa fa-clock-o"></i> 25 Juli 12:05</span>
                      </div>
                    </div>
                  </li>

                  <li>
                    <i class="fa fa-info bg-blue"></i>
                    <!--issue content goes here-->
                    <div class="timeline-item">
                      <h3 class="timeline-header">
                        <a href="#">
                          <big>
                            Issue Pengembangan Sistem
                          </big>
                        </a>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </h3>
                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a href="{{url('')}}/edit-issue" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger btn-xs">Pending</a>
                        <span class="time pull-right"><i class="fa fa-clock-o"></i> 12 Juli 12:05</span>
                      </div>
                    </div>
                  </li>

                  <li>
                    <div class="timeline-item">
                      <a href="{{url('')}}/input-issue" class="btn btn-primary">Tambahkan issue</a>
                    </div>
                  </li>

                </ul>
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

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap2/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["January", "February", "March", "April", "May", "June", "July"],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 59, 80, 81, 56, 55, 40]
        },
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);




    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barchart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
</body>
</html>
