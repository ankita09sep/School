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
	  
?>	 
	 
<?php
$dbh=new PDO ('mysql:host=localhost;dbname=firstdb', 'root', '');
if(isset($_POST["del"]))
{
	$name=$_POST["F1"];
    
	$sql= "delete from student where name='$name'"; 
    $abc = $dbh->prepare($sql);
    $abc->execute();
	echo "one record deleted from database...";
}
?>
<form action="delete.php" method="POST">
Name: <input type="text" id="F1" name="F1"><br>
<input type="submit" name="del" value="delete">
</form></center>
</body>
</html>