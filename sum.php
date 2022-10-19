<html>
<head></head>
<body>
<?php
     $a=9876;
	 $sum=0;
	 while($a>=1)
	 {
	   $rem=$a%10;
	   $sum=$sum+$rem;
	   $a=$a/10;
	 }
	 echo "sum of digits=".$sum;
?>
</body>
</html>	 