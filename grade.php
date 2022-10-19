<html>
<head>
</head>
<body>
<?php
if (isset ($_POST["sub"]))
{
	$a=$_POST["t1"];
	$a1=$_POST["t2"];
	$a2=$_POST["t3"];
	$a3=$_POST["t4"];
	$sum=$a1+$a2+$a3;
	$avg=$sum/3;
	
	if ($avg>0&&$avg<=50)
		$grade ="fail";
	
	if ($avg>50&&$avg<=70)
		$grade ="A";
	
	if ($avg>70&&$avg<=90)
		$grade ="B";
	
	if ($avg>90)
		$grade ="E";
}

	echo "<br>";
?>
<form action="grade.php"method="POST">
 <input type="text"name="t1">
 <input type="text"name="t2">
 <input type="text"name="t3">
 <input type="text"name="t4">
 <input type="submit"name="sub"value="result">
 </form>
 <body>
 </html>