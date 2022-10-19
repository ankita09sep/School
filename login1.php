<html>
<head>
</head>
<body>
<?php
      $dbh=new PDO('mysql:host=localhost;dbname=firstdb','root','');


      if(isset($_REQUEST["signup"]))
      {
	     header("Location:signup.php");
      }


       if(isset($_REQUEST["login"]))
      {
	       $id=$_REQUEST["ID"];
	       $pswd=$_REQUEST["PSWD"];
	       $type=$_REQUEST["type"];
	
	$sql= "select * from emp_login where id='$id'";
	$link = $dbh->prepare($sql);
    $link->execute();
	$data = $link->fetch();
	
	            if($id==$data['id'] && $pswd==$data['pswd'])
	            {
		           session_start();
		           $_SESSION['login']=$data['id'];
		           header("Location:frontpg.php");
		           die("");
	             }
	
	                else
		                echo "Invalid Login Provided. Please re-login";
	
	        if(isset($_SESSION['login']))
		       unset($_SESSION['login']);
	  }
?>


<h1><center><u><b>STUDENT ZONE</b></u></center></h1>
<form action="login.php"method="POST">
<center>  <b>ID:</b> <input type="text" id="ID" name="ID">
          <b>PSWD:</b> <input type="password" id="PSWD" name="PSWD">
		  <select name="type" id="type"> <option value="admin">Admin<option>
		                                 <option value="admin">Other<option></select></br></br>
		  <input type="submit" name="login" value="LogIn"></center></br>
		  <center>Create a new login id.signUp here....</center></br>
		  <center><input type="submit" name="signup" value="SignUp"></center></br>
		  
</form>
</body>
</html>