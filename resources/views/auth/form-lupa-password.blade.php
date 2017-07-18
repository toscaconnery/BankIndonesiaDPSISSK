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
    <form action="{{ url('') }}/reset-password" method="post">
      {{ csrf_field() }}
      <!--NIP-->
      <div class="field-wrap">
        <center>
          <h2><font color="#999999">{{$user->name}}</font></h2>
          <h2><font color="#999999">{{$user->nip}}</font></h2>
        </center>
      </div>

      <!--Password-->
      <div class="field-wrap">
        <h3>{{$user->security_question}}</h3>
      </div>

      <div class="field-wrap">
        <label>
          Jawaban<span class="req">*</span>
        </label>
        <input id="securityAnswer" name="securityAnswer" type="text" required autocomplete="off"/>
      </div>

      <input type="hidden" name="nip" value="{{$user->nip}}">

      <div class="field-wrap">
        <label>
          Password Baru<span class="req">*</span>
        </label>
        <input id="password" name="password" type="password" required autocomplete="off"/>
      </div>

      <div class="field-wrap">
        <label>
          Ketik Ulang Password Baru<span class="req">*</span>
        </label>
        <input id="passwordConfirmation" name="passwordConfirmation" type="password" required autocomplete="off"/>
      </div>

      <button type="submit" class="button button-block">Reset</button>
    </form>    
  </div> 

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>
  <script src="{{url('')}}/bootstrap2/js/bootstrap.min.js"></script>
  <script src="{{url('')}}/sweetalert/dist/sweetalert.min.js"></script>
  @include('sweet::alert')
</body>
</html>
