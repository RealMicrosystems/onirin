     <?php
     $connection =  include_once('resources/conection.inc.php');
     
     session_start();
     if(isset($_SESSION['user']))
     {
      header("location:stock/new.php");
     }

    if (isset($_POST['submit']))
    { 
      $username = htmlentities($_POST['username']);
      $username = strtoupper(mysqli_real_escape_string($mysqli,$username));
      echo $username;

      $password = htmlentities($_POST['password']);
      $password = strtoupper(mysqli_real_escape_string($mysqli,$password));
      $password = md5($password);

      $query = "SELECT * FROM users where username = '$username' and password = '$password'";
      $result = mysqli_query($mysqli, $query);
      $count = mysqli_num_rows($result);

      if($count == 1)
      {
        $data = mysqli_fetch_assoc($run_query);
        $_SESSION['user'] = serialize($_POST);
        header("location:stock/new.php");   // this seems to be the mos uses  page 
      }   
      else
      {
        echo "<div class='alert alert-dismissable alert-danger'>
        <center><i class='fa fa-fw fa-times'></i>&nbsp; <strong>ERROR!</strong> INCORRECT USERNAME OR PASSWORD</center>
      </div>";
    }

  }
  ?>


  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | General Form Elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">


    .center-div{
      margin-top:10%;
    }

  </style>
</head>


<body class="hold-transition skin-blue sidebar-mini">   

 <header class="main-header">
  <!-- Logo -->
  <a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">

    </div>
  </nav>
</header>








<div class= "container-fluid">
  <div class = "row">
    <div class = "col col-md-4 col-xs-12 col-sm-4 col-xs-10 col-xs-offset-1 col-md-offset-4 center-div">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Login</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" method = 'POST' action = '<?php echo $_SERVER['PHP_SELF']?>'>
          <div class="box-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Username</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" autocomplete="false"  placeholder="Email" name = 'username'>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = 'password'>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">

            <button type="submit" name = 'submit' class="btn btn-info pull-right">Sign in</button>
          </div>
          <!-- /.box-footer -->
        </form>
      </div>
    </div>
  </div>
</div>
<script src=".js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/app.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script> -->
</body>
</html>

