<?php
  if(Session::has('role')){
    header('Location:'.url(Session::get('role')));die();
  }
?>
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Sisfo Laundry Rakyat | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{url('sisfo')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{url('sisfo')}}/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{url('sisfo')}}/css/AdminLTE.css" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Selamat Datang di Sisfo Laundry Rakyat</div>
            <form action="#" method="post" id="formlogin">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="button" onclick="doLogin()" class="btn bg-olive btn-block">Sign me in</button>  
                    
                    <p><a href="#">I forgot my password</a></p>

                </div>
            </form>
        </div>

<!-- jQuery 2.2.3 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
<Sript src="{{url('sisfo')}}/js/bootstrap.min.js" type="text/javascript"></script>
<script>
  var doLogin = function(){
    console.log("clicked login")
    $.ajax({
      url: "{{url('pemilik/dologin')}}",
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
