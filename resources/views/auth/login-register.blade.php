<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login PMO&RMS</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="{{url('')}}/css/bootstrap.css">
  <link rel="stylesheet" href="{{url('')}}/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('')}}/sweetalert/dist/sweetalert.css">
</head>

<body>
  <div class="form">

    <center><img src="logo-bank-indonesia-300x130.png" style="width:300px; height:130px;"></center>
    <br>
    <!-- <ul class="tab-group">
      <li class="tab active"><a href="#signup">PMO</a></li>
      <li class="tab"><a href="#login">RMS</a></li>
    </ul> -->

    <ul class="tab-group">
      <li class="tab active"><a href="#login">Log In</a></li>
      <li class="tab"><a href="#register">Register</a></li>
    </ul>

    <div class="tab-content">
      <div id="login">
        <form action="{{ route('login') }}" method="post">
          {{ csrf_field() }}
          <!--NIP-->
          <div class="field-wrap">
            <label>
              NIP<span class="req">*</span>
            </label>
            <input id="nip" name="nip" type="text" autocomplete="off"/>
          </div>

          <!--Password-->
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input id="password" name="password" type="password" autocomplete="off"/>
          </div>
          
          <p class="forgot" data-toggle="modal" data-target="#myModal2" style="cursor: pointer;"><a>Forgot Password?</a></p>

          <button type="submit" class="button button-block">Log In</button>
        </form>
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Masukkan NIP</h3></center>
              </div>
              <div class="modal-body">
                <!--Tahun Anggaran-->
                <form action="{{ route('login') }}" method="post">
                  <div class="field-wrap {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>
                      NIP<span class="req">*</span>
                    </label>
                    <input id="pertanyaan" name="pertanyaan" type="number" autocomplete="off"/>
                  </div>
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errrors->first('name') }}</strong>
                  </span>
                  @endif
                  <!-- /.box-body -->
                  <div class="modal-footer-new">
                    <div class="field-wrap">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <button type="submit" id="validasiform" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="register">
        <form action="{{ route('register') }}" method="post">
          {{ csrf_field() }}
          <!--Name-->
          <div class="field-wrap {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>
              Nama<span class="req">*</span>
            </label>
            <input id="name" name="name" type="text" autocomplete="off"/>
          </div>
          @if ($errors->has('name'))
          <span class="help-block">
            <strong>{{ $errrors->first('name') }}</strong>
          </span>
          @endif

          <!--NIP-->
          <div class="field-wrap {{ $errors->has('nip') ? ' has-error' : '' }}">
            <label>
              NIP<span class="req">*</span>
            </label>
            <input id="nip" name="nip" type="text" autocomplete="off"/>
          </div>
          @if ( $errors->has('nip'))
          <span class="help-block">
            <strong>{{ $errors->first('nip') }}</strong>
          </span>
          @endif

          <!--Email-->
          <div class="field-wrap {{ $errors->has('email') ? ' has-error' : '' }}">
            <label>
              Email<span class="req">*</span>
            </label>
            <input id="email" name="email" type="email" autocomplete="off"/>
          </div>
          @if ( $errors->has('email'))
          <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif

          <!--Password-->
          <div class="field-wrap {{ $errors->has('password') ? ' has-error' : '' }}">
            <label>
              Password<span class="req">*</span>
            </label>
            <input id="password" name="password" type="password" autocomplete="off"/>
          </div>
          @if( $errors->first('password'))
          <span class="help-block">{{ $errors->first('password') }}</span>
          @endif

          <!--Confirmation Password-->
          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input id="password-confirm" name="password_confirmation" type="password" autocomplete="off"/>
          </div>
          
          <button type="button" data-toggle="modal" data-target="#myModal" class="button button-block">Register</button>
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <center><h3 class="modal-title" id="myModalLabel" style="font-weight: bold;">Pertanyaan Security</h3></center>
                </div>
                <div class="modal-body">

                  <!--Tahun Anggaran-->
                  <div class="field-wrap {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>
                      Pertanyaan<span class="req">*</span>
                    </label>
                    <input id="pertanyaan" name="pertanyaan" type="text" autocomplete="off"/>
                  </div>
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errrors->first('name') }}</strong>
                  </span>
                  @endif

                  <div class="field-wrap {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label>
                      Jawaban<span class="req">*</span>
                    </label>
                    <input id="jawaban" name="jawaban" type="text" autocomplete="off"/>
                  </div>
                  @if ($errors->has('name'))
                  <span class="help-block">
                    <strong>{{ $errrors->first('name') }}</strong>
                  </span>
                  @endif
                  <!-- /.box-body -->
                  <div class="modal-footer-new">
                    <div class="field-wrap">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <button type="submit" id="validasiform" class="btn btn-primary">Submit</button>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div><!-- tab-content -->
  </div> <!-- /form -->

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  <script src="{{url('')}}/bootstrap2/js/bootstrap.min.js"></script>
  <script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
  @include('sweet::alert')
</body>
</html>
