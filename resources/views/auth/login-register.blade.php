<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="form">

    <center><img src="logo-BI.jpg" style="width:300px; height:130px;"></center>
    <br>
    <!-- <ul class="tab-group">
      <li class="tab active"><a href="#signup">PMO</a></li>
      <li class="tab"><a href="#login">RMS</a></li>
    </ul> -->

    <ul class="tab-group">
        <li class="tab active"><a href="#login">Log Inx</a></li>
        <li class="tab"><a href="#register">Register</a></li>
    </ul>

    <div class="tab-content">
      <div id="login">
        <form action="{{ route('login') }}" method="post">
          {{ csrf_field() }}
          <!--NIP-->
          <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input id="email" name="email" type="text" required autocomplete="off"/>
          </div>

          <!--Password-->
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input id="password" name="password" type="password" required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button type="submit" class="button button-block">Log In</button>

        </form>
      </div>

      <div id="register">
        <form action="{{route('register')}}" method="post">
          {{ csrf_field() }}
          <!--Name-->
          <div class="field-wrap {{ $errors->has('name') ? ' has-error' : '' }}">
            <label>
              Nama<span class="req">*</span>
            </label>
            <input id="name" name="name" type="text" required autocomplete="off"/>
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
            <input id="nip" name="nip" type="text" required autocomplete="off"/>
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
            <input id="email" name="email" type="email" required autocomplete="off"/>
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
            <input id="password" name="password" type="password" required autocomplete="off"/>
          </div>
          @if( $errors->first('password'))
            <span class="help-block">{{ $errors->first('password') }}</span>
          @endif

          <!--Confirmation Password-->
          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
            <input id="password-confirm" name="password_confirmation" type="password" required autocomplete="off"/>
          </div>
          
          <button type="submit" class="button button-block">Register</button>
        </form>
      </div>
    </div><!-- tab-content -->

  </div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="js/index.js"></script>

</body>
</html>
