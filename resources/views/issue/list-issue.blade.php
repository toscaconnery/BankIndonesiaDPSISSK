<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI PMO&RMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Daftar Issue
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-newspaper-o"></i> Issue</a></li>
        </ol>
      </section>
      
      <!--Issue-->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <!-- /.box-header -->
              <!-- content start -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <div style="overflow-y: scroll; height: 36em">
                      <ul class="timeline">
                        <li class="time-label">
                          <span class="bg-blue">
                            Issue yang perlu diperhatikan
                          </span>
                        </li>
                        <!--list issue-->
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
                              {{--                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button> --}}
                          </h3>

                          <div class="timeline-body">
                            {{$issue->isi}}
                          </div>
                          <div class="timeline-body">
                            <small>
                              <cite>
                                {{ $issue->name }}
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
                          <div class="timeline-body">
                            <small>
                              <cite>
                                Sherlock Holmes
                              </cite>
                            </small>
                          </div>
                          <div class="timeline-footer">
                            <a href="{{url('')}}/edit-issue" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <!-- <a class="btn btn-primary btn-xs">Informasi</a> -->
                            <a class="btn btn-warning btn-xs">Pending</a>
                            <span class="time pull-right"><i class="fa fa-clock-o"></i> 28 Juli 2017</span>
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
                          <div class="timeline-body">
                            <small>
                              <cite>
                                Sherlock Holmes
                              </cite>
                            </small>
                          </div>
                          <div class="timeline-footer">
                            <a href="{{url('')}}/edit-issue" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <!-- <a class="btn btn-primary btn-xs">Diskusi</a> -->
                            <a class="btn btn-info btn-xs">On Progress</a>
                            <span class="time pull-right"><i class="fa fa-clock-o"></i> 25 Juli 2017</span>
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
                          <div class="timeline-body">
                            <small>
                              <cite>
                                Sherlock Holmes
                              </cite>
                            </small>
                          </div>
                          <div class="timeline-footer">
                            <a href="{{url('')}}/edit-issue" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                            <!-- <a class="btn btn-primary btn-xs">Diskusi</a> -->
                            <a class="btn btn-info btn-xs">On Progress</a>
                            <span class="time pull-right"><i class="fa fa-clock-o"></i> 25 Juli 2017</span>
                          </div>
                        </div>
                      </li>

                    </ul>
                  </div>
                  <br>
                  <center>
                    <div class="timeline-item">
                      <button class="btn btn-standard" data-toggle="modal" data-target="#myModal">Tambahkan issue</button>
                      <a href="{{url('')}}/list-all-issue"><button class="btn btn-primary">Tampilkan Semua</button></a>
                    </div>
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Tambah Issue</h3></center>
                          </div>
                          <div class="modal-body">
                            <form class="form-horizontal" method="post" action="{{url('')}}/input-issue">
                              <div class="box-body">

                                {{ csrf_field() }}
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                                  <div class="col-sm-10">
                                    <input name="judul" type="text" class="form-control" id="inputEmail3">
                                  </div>
                                </div>

                                <!--Issue-->
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Issue</label>
                                  <div class="col-sm-10">
                                    <textarea name="isi" class="form-control" rows="8"></textarea>
                                  </div>
                                </div>

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
                    </center>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box -->
          </div>
        </div>
      </div>
    </section>
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
  <script src="/plugins/chartjs/Chart.min.js"></script>
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

    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = areaChartOptions;
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData, lineChartOptions);

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
    {
      value: 700,
      color: "#f56954",
      highlight: "#f56954",
      label: "Chrome"
    },
    {
      value: 500,
      color: "#00a65a",
      highlight: "#00a65a",
      label: "IE"
    },
    {
      value: 400,
      color: "#f39c12",
      highlight: "#f39c12",
      label: "FireFox"
    },
    {
      value: 600,
      color: "#00c0ef",
      highlight: "#00c0ef",
      label: "Safari"
    },
    {
      value: 300,
      color: "#3c8dbc",
      highlight: "#3c8dbc",
      label: "Opera"
    },
    {
      value: 100,
      color: "#d2d6de",
      highlight: "#d2d6de",
      label: "Navigator"
    }
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
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
