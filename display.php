<?php
$ctgry=$_REQUEST['category'];
try 
{
	$dbh = new PDO('mysql:host=localhost;dbname=firstdb', 'root', '');
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="select * from student where category='$ctgry'";
	$stmt=$dbh->prepare($sql);
	$stmt->execute();
	$row = $stmt->fetchAll();
	$txt="<table border=1>";
	if ($row)
	foreach($row as $rs)
	{
		 $txt.= "<tr><td>".$rs['name']."</td>";
         $txt.= "<td>".$rs['father_name']."</td>";
         $txt.= "<td>".$rs['mother_name']."</td>";
         $txt.= "<td>".$rs['dob']."</td>";
         $txt.= "<td>".$rs['gender']."</td>";
		 $txt.= "<td>".$rs['category']."</td>";
		 $txt.= "<td>".$rs['Branch']."</td>";
         $txt.= "<td>".$rs['mode_of_admission']."</td></tr>";
	}
	
    else
	$txt.="<tr><td>Unmatched category $ctgry</td></tr>";
        $txt.="</table>";
		echo $txt;
}
    catch (Exception $x)  {
	echo "Some error ".$x->getmessage();
	echo $sql;
}
?>