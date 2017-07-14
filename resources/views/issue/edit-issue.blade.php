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
        Edit Issue
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-newspaper-o"></i> Issue</a></li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-sm-7">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h2 class="box-title">Form Edit Issue</h2>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="" method="post">
              <div class="box-body">
                
                {{ csrf_field() }}
                <!--Judul-->
                <div class="form-group">
                  <label for="judul" class="col-sm-3 control-label">Judul</label>
                  <div class="col-sm-9">
                    <input name="judul" type="text" class="form-control" id="judul" value="{{$issue->judul ? $issue->judul : ''}}">
                  </div>
                </div>

                <!--Issue-->
                <div class="form-group">
                  <label for="issue" class="col-sm-3 control-label">Issue</label>
                  <div class="col-sm-9">
                    <textarea name="isi" class="form-control" id="judul" rows="8">{{$issue->isi ? $issue->isi : ''}}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="pic" class="col-sm-3 control-label">PIC</label>
                  <div class="col-sm-9">
                    <input name="pic" type="text" class="form-control" id="pic" value="{{$issue->pic ? $issue->pic : ''}}" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tindaklanjut" class="col-sm-3 control-label">Tindak Lanjut</label>
                  <div class="col-sm-9">
                    <textarea name="tindak_lanjut" class="form-control" id="tindaklanjut" rows="4">{{$issue->tindak_lanjut ? $issue->tindak_lanjut : ''}}</textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="pictindaklanjut" class="col-sm-3 control-label">PIC Tindak Lanjut</label>
                  <div class="col-sm-9">
                    <input name="pictindaklanjut" type="text" class="form-control" id="pictindaklanjut" value="{{$issue->pic_tindak_lanjut ? $issue->pic_tindak_lanjut : '-'}}" disabled>
                  </div>
                </div>

                <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Status</label>
                <div class="col-sm-9">
                  <select name="status" class="form-control select2" style="width: 100%;">
                  <option {{$issue->status == 'Pending' ? 'selected' : ''}} value="Pending">Pending</option>
                  <option {{$issue->status == 'On Progress' ? 'selected' : ''}} value="On Progress">On Progress</option>
                  <option {{$issue->status == 'Finish' ? 'selected' : ''}} value="Finish">Finish</option>
                </select>
                </div>
              </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              <div class="btn-toolbar">
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                <button type="reset" class="btn btn-danger pull-right">Cancel</button>
              </div>
              </div>
              <!-- /.box-footer -->
            </form>
            
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>
  @include('layouts.footer')
</div>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>$.widget.bridge('uibutton', $.ui.button);</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="plugins/knob/jquery.knob.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
</body>
</html>
