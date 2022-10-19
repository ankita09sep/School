<?php
try
{
   $dbh = new PDO ('mysql:host=localhost;dbname=firstdb', 'root', '');
   $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $stmt = $dbh->prepare("select * from STOCK");
   $stmt->execute();
   $rows = $stmt->fetchAll();
 ?>
 <table border=1>
 <?php
 foreach ($rows as $rs)
 {
 echo "<tr><td>".$rs['Product_id']."</td>";
 echo "<td>".$rs['Product_name']."</td>";
 echo "<td>".$rs['Price']."</td></tr>";
 }
} catch  (Exception $x)  {
	echo "Some error ".$x->getmessage();
}
?>
</table>
