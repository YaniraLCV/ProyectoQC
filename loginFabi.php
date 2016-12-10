<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
	   
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      
		
      // if($count == 1) {
		  if(1 == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: index.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    

    <title>Login</title>

    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" >
	<link href="asset/plugins/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<link href="asset/plugins/font-awesome/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
	<link href="asset/css/Login.css"  rel="stylesheet" type="text/css">
	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->



</head>

<body class="fede">
<from>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-6 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img class="profile-img img-responsive" src="asset/img/logo.png" alt="" />
                    </div>
                    <ul id="myTab" class="nav nav-tabs nav-rtl" role="tablist">
                        <li class="active"><a href="#pnlLogin" data-toggle="tab">Sign In</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content">

                        <!--Iniciar Sesión -->
                        <form class="tab-pane active in" id="pnlLogin">
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <div class="col-sm-10 col-sm-offset-1">
									
                                        <div style="margin-bottom: 1%" class="input-group">
                                            <span class="input-group-addon " ><i class="glyphicon glyphicon-envelope"></i></span>

                                            <input type="email" class="form-control" name="username" placeholder="Email" required />
                                        </div>

                                    </div>


                                    <div class="col-sm-10 col-sm-offset-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input type="password" class="form-control" name="password"  placeholder="Contraseña" required />
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <div class="checkbox">
                                                <label class="">
                                                    <input type="checkbox" value="remember-me">Remember me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <div class="col-sm-offset-4 col-sm-12">
                                            <input type="submit" class="btn btn-success btn-sm" id="btnnLogin" value="Iniciar Sesión" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Fin Iniciar Sesión -->


                    </div>
                </div>
            </div>
        </div>
    </div>

</from>
    <!-- ============================ JavaScript ====================== -->

   <script src="asset/js/jquery.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>


</body>

</html>