<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ReservationRoom</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{url('')}}/bootstrap/css/bootstrap.min.css">
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

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  @include('layout.header')
  @include('layout.navbar')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Dashboard</a></li>
      </ol>
    </section>
    <br>
  </div>
  <?php include 'footer.php';?>
</div>

<script src="{{url('')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button);</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('')}}/bootstrap/js/bootstrap.min.js"></script>
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
</body>
</html>
