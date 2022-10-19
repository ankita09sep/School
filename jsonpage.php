<?php
header("Content-Type: application/json");
try
{
$dbh=new PDO('mysql:host=localhost;dbname=firstdb','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("select * from stock");
$stmt->execute();
$rows=$stmt->fetchAll();
echo json_encode($rows);
}
catch (Exception $x)
{
	echo "Some error ".$x->getMessage();
}
?>	