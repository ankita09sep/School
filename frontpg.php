<html>
<head>
</head>
<body>
<center>
<?php
    session_start();
    if(!isset($_SESSION['login']))
    {
	   header("refresh:5; url=login.php");
	   die('Unauthorized access. Redirecting to login page in 5 sec.....');
     }
	 echo $_SESSION['login'];
	 
?>
	
<?php
   if(isset($_POST["insert"]))
   {
	header("Location:form.php");
   }
   if(isset($_POST["delete"]))
   {
	header("Location:delete.php");
   }
   if(isset($_POST["view"]))
   {
	header("Location:select.php");
   }
   if(isset($_POST["logout"]))
   {
	header("Location:logout.php");
   }
?>

<form action="#" method="POST">

Logged in successfully....
<h2><b><u>STUDENT ZONE</u></b><br></h2>
<input type="submit" name="insert" value="insert">
<input type="submit" name="delete" value="delete">
<input type="submit" name="view" value="view">
<input type="submit" name="logout" value="logout">
</form>
</center>
</body>
</html>