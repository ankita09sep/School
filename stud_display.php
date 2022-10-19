<?php
header("Content-Type: application/json");
$Name=$_REQUEST['name'];
try
{
$dbh=new PDO('mysql:host=localhost;dbname=firstdb','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$sql="select * from student where name='$Name'";
$stmt=$dbh->prepare($sql);
$stmt->execute();
$row=$stmt->fetchAll();
echo json_encode($row);
}
catch (Exception $x)
{
	echo "Some error ".$x->getMessage();
}
?>