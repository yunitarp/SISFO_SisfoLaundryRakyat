<?php
  if(Session::has('role')){
    header('Location:'.url(Session::get('role')));die();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sifo Akademik | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('sisfo')}}/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('css')}}/fa/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{url('css')}}/ionicon/css/ionicons.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('sisfo')}}/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>SISTEM INFORMASI</b> LAUNDRY RAKYAT</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Masukkan Username dan Password</p>

    <form id="formlogin">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username">
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" onclick="doLogin()" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="{{url('sisfo')}}/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('sisfo')}}/bootstrap/js/bootstrap.min.js"></script>
<script>
  var doLogin = function(){
    $.ajax({
      url: "{{url('/dologin')}}",
      data: $("#formlogin").serialize(),
      method: "POST",
      success:function(data){
        if(data == "true"){
          console.log("ganteng"); 
          document.location.reload();
        }else{
          alert('Username atau password tidak cocok');
        } 
      }
    });
  }
</script>
</body>
</html>
