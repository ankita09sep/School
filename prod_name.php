<?php
$prodid=$_REQUEST['Product_id'];
try 
{
	$dbh = new PDO('mysql:host=localhost;dbname=firstdb', 'root', '');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt=$dbh->prepare("select * from stock where Product_id=$prodid");
	$stmt->execute();
	$row = $stmt->fetch();
	if ($row)
	echo "Purchase ".$row['Product_name'];
    else 
	echo "Product Id $prodid not found";
}
 catch  (Exception $x)  {
	echo "Some error ".$x->getmessage();
 }
?>

