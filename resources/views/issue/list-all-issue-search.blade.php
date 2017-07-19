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
  <link rel="stylesheet" href="{{url('')}}/sweetalert/dist/sweetalert.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('layouts.header')
    @include('layouts.navbar')
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
        Hasil Pencarian Issue
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
                  <form method="post" action="{{url('')}}/pencarian-issue">
                    {{ csrf_field() }}
                    <div class="col-xs-2">
                      <div class="form-group">
                        <select id="pilihtahun" class="form-control select2" style="width: 100%;" name="tahuncari">
                          <option value="">Pilih Tahun</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-xs-4">
                      <input type="text" name="judulcari" class="form-control" placeholder="Ketikkan Judul Issue...">
                    </div>
                    <div class="col-xs-1">
                      <button type="submit" class="btn btn-block btn-success">Cari</button>
                    </div>
                  </form>
                  <div class="col-md-12">
                    <div style="overflow-y: scroll; height: 30em">
                      <ul class="timeline">
                          @if(!is_null($issue))
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
                          @endif
                          @if($adadata == 0)
                          <li>
                            <i class="fa fa-info bg-blue"></i>
                            <!--issue content goes here-->
                            <div class="timeline-item">
                              <h3 class="timeline-header">
                                <a href="#">
                                  <big>
                                    Tidak ada issue.
                                  </big>
                                </a>
                              </h3>
                            </div>
                          </li>
                          @endif
                      </ul>
                    </div>
                    <br>
                    <center>
                      <div class="timeline-item">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambahkan issue</button>
                      </div>
                      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Form Tambah Issue</h3>
                            </div>
                            <div class="modal-body">
                              <form class="form-horizontal" method="post" action="{{url('')}}/input-issue">
                                <div class="box-body">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
                                    <div class="col-sm-10">
                                      <input name="judul" type="text" class="form-control" id="judul">
                                    </div>
                                  </div>

                                  <!--Issue-->
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Issue</label>
                                    <div class="col-sm-10">
                                      <textarea name="isi" class="form-control" rows="8" id="isi"></textarea>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="modal-footer">
                                      <button type="reset" class="btn btn-danger">Reset</button>
                                      <button type="submit" id="validasiissue" class="btn btn-primary">Submit</button>
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

    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>$.widget.bridge('uibutton', $.ui.button);</script>
    <!-- Bootstrap 3.3.6 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{url('')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="{{url('')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{url('')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{url('')}}/plugins/knob/jquery.knob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{url('')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="{{url('')}}/dist/js/pages/dashboard.js"></script>
    <script src="{{url('')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{url('')}}/bootstrap/js/bootstrap.min.js"></script>
      <!-- SlimScroll -->
    <script src="{{url('')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="{{url('')}}/plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('')}}/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('')}}/dist/js/demo.js"></script>
    <script src="{{url('')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{url('')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <script>
      $(function() {
        $("#validasiissue").click(function (event) {
            if (document.getElementById('judul').value === '') {
              swal({
                title: "Judul Issue Harus Diisi!",
                type: "warning",
                allowOutsideClick: true, 
              });
              return false;
            }
            else if (document.getElementById('isi').value === '') {
              swal({
                title: "Issue Harus Diisi!",
                type: "warning", 
                allowOutsideClick: true,
              });
              return false;
            }
        });
      });
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
  </body>
  </html>
