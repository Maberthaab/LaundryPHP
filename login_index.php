<?php
error_reporting(0);
	session_start();
	include "koneksi.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Login Admin Laundry</title>
	  <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="dist/img/avatar5.png">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/purple.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
body{
 background-image: url(dist/img/1.jpg);
 width: auto;
}

.form{
 background:rgba(0, 0, 0, 0.39);
 box-shadow: 0px 0px 20px 6px;
 border-radius:5px;
 width:300px;
 margin:15px auto;
 padding:20px;
 margin-top: 100px;
}

.form h3{
 color:#eee;
 text-align:center;
 font-family: arial, "times new roman";
}

.form img{
 width:50%;
}

#input{
 background: rgba(23, 20, 20, 0.52);
 font-size:12pt;
 font-family:arial;
 color:#eee;
 width:100%;
 height:40px;
 padding:5px 5px 5px 10px;
 margin:3px;
 border-radius:3px;
 border:none;
}
#input[type="submit"]{
 background:rgba(31, 15, 2, 0.78);
 color:#fff;
 cursor:pointer;
 
}
#input:hover, #input:focus{
 background:rgba(97, 52, 13, 0.55);
 outline-style:none;
}
#input[type="submit"]:hover, #input[type="submit"]:focus{
 background:rgba(31, 15, 2, 0.78);
}
    </style>
</head>
<body>

	<?php if (isset($error)):?>
	<script type="text/javascript">
	alert("username password salah")
</script>

<?php endif; ?>
 		
<div class="form">
  <h3 style="color:#fff;font-family:Hobo Std">SISTEM LAUNDRY</h3>
  <center><img src="dist/img/avatar2.jpg" style="border-radius:100px; width:70px "></center>
  <form method="POST" action="">
  <span style="color:#fff;font-family:Comic Sans MS"><b>Username</b></span>
   <input id="input" type="text" name="user" placeholder="Username" style="border-radius:10px">
   <span style="color:#fff;font-family:Comic Sans MS"><b>Password</b></span>
   <input id="input" type="password" name="pass" placeholder="Password" style="border-radius:10px">
   <br/>
   <br>
   <input id="input"  type="submit" value="Login" style="border-radius:10px">
  </form>
 </div>
</body>
</html>

	<?php

		$username=$_POST['user'];
		$password=$_POST['pass'];
		$query=mysqli_query($connect,"SELECT * FROM tb_login WHERE username='$username' and password='$password'");

		 $masuk=mysqli_num_rows($query);

		 if($masuk > 0){

		 			$data=mysqli_fetch_assoc($query);
		
			if ($data["level"]=="admin"){
				$_SESSION['username']="$username";
				$_SESSION['level']="admin";
				echo"<script> alert('Login Sukses')
				document.location.href='index.php'</script>";	
			}else{
				header("location:index.php?pesan=gagal");
			}
		}
	 ?>