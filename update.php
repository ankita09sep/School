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
if(isset($_POST["sub"]))
{
$dbh=new PDO ('mysql:host=localhost;dbname=firstdb', 'root', '');
	$name=$_POST["F1"];
    $fathers_name=$_POST["F2"];
    $mothers_name=$_POST["F3"];
    $dob=$_POST["F4"];
    $gender=$_POST["F5"];
    $category=$_POST["F6"];
	$branch=$_POST["F7"];
	$moa=$_POST["F8"];
	
	$sql="update student set father_name='$fathers_name',
	mother_name='$mothers_name', dob='$dob', gender='$gender',
	category='$category' branch='$branch' mode_of_admission='$moa' where name='$name'";
    $abc=$dbh->prepare($sql);
    $abc->execute();
  echo "record updated successfully";
}  
?>
</center>
</body>
</html>