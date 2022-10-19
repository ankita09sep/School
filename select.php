<html>
<head>
<script src="js/jquery-3.6.0.min.js"></script>
<script>
$( function() {
	 $("#btn_search").on( "click", function() {
		 console.log("ok");
		 var categ=$("#F3").val();
		 $.post("display.php", { category: categ }, function( data )
			 {
				 $( "#txt_result" ).html( data );
	   });
    });
});
$( function() {
	 $("#btn_find").on( "click", function() {
		 console.log("ok");
		 var brn=$("#F4").val();
		 $.post("display_br.php", { Branch: brn }, function( data )
			 {
				 $( "#txt_data" ).html( data );
	   });
    });
});
</script>
</head>
<body>
<table border =1>

<?php
session_start();
    if(!isset($_SESSION['login']))
    {
	   header("refresh:5; url=login.php");
	   die('Unauthorized access. Redirecting to login page in 5 sec.....');
	}

$dbh = new PDO('mysql:host=localhost;dbname=firstdb', 'root', '');
if(isset($_POST["fetch"]))
{
	  $name=$_POST["F1"];
	  $sql= "select * from student where name='$name'";
	  $link = $dbh->prepare($sql);
      $link->execute();
	  $data = $link->fetch();
      $g=$data['gender'];
	  if ($g=='male')
	  {
		  $mcheck='checked="checked"';
		  $fcheck="";
	  }
	  else
	  {
		  $fcheck='checked="checked"';
		  $mcheck="";
	  }
	  $c=$data['category'];
	  if ($c=='st')
	  {
		  $stcheck='checked="checked"';
		  $sccheck="";
		  $obccheck="";
		  $gencheck="";
	  }
	  else if ($c=='sc')
	  {
		  $sccheck='checked="checked"';
		  $obccheck="";
		  $gencheck="";
		  $stcheck="";
	  }
	  else if ($c=='obc')
	  {
		  $obccheck='checked="checked"';
		  $gencheck="";
		  $stcheck="";
		  $sccheck="";
	  }
	  else 
	  {
		  $gencheck='checked="checked"';
		  $stcheck="";
		  $sccheck="";
		  $obccheck="";
	  }
?>
<form action="update.php" method="POST">
Name: <input type="text" id="F1" name="F1" value="<?php echo $data['name']; ?>"></br>
Father's Name: <input type="text" id="F2" name="F2" value="<?php echo $data['father_name']; ?>"></br>
Mother's Name: <input type="text" id="F3" name="F3" value="<?php echo $data['mother_name']; ?>"></br>
D.O.B.: <input type="date" id="F4" name="F4" value="<?php echo $data['dob'];?>"></br>
Gender: Male <input type="radio" id="F5" name="F5" value="male" <?php echo $mcheck; ?>> 
       Female <input type="radio" id="F5" name="F5" value="female" <?php echo $fcheck; ?>></br>

Category: ST <input type="radio" id="F6" name="F6" value="st" <?php echo $stcheck ?>> 
          SC <input type="radio" id="F6" name="F6" value="sc" <?php echo $sccheck ?>> 
		  OBC <input type="radio" id="F6" name="F6" value="obc" <?php echo $obccheck ?>> 
		  GEN <input type="radio" id="F6" name="F6" value="gen" <?php echo $gencheck ?>></br>
		  
Branch: <input type="text" id="F7" name="F7" value="<?php echo $data['Branch']; ?>"></br>
Mode of admission: <input type="text" id="F8" name="F8" value="<?php echo $data['mode_of_admission']; ?>"><br>
<input type="submit" name="sub" value="upload">
</form>

<?php
	echo "<tr><td>".$data['name']."</td>";
	echo "<td>".$data['father_name']."</td>";
	echo "<td>".$data['mother_name']."</td>";
	echo "<td>".$data['dob']."</td>";
	echo "<td>".$data['gender']."</td>";
	echo "<td>".$data['category']."</td>";
	echo "<td>".$data['Branch']."</td>";
	echo "<td>".$data['mode_of_admission']."</td></tr>";
}

if(isset($_POST["search"]))
{
	$g=$_POST["F2"];
	$sql= "select * from student where gender='$g'";
	$link = $dbh->prepare($sql);
    $link->execute();
	$data = $link->fetchAll();

 foreach ($data as $rs)
 {
 echo "<tr><td>".$rs['name']."</td>";
 echo "<td>".$rs['father_name']."</td>";
 echo "<td>".$rs['mother_name']."</td>";
 echo "<td>".$rs['dob']."</td>";
 echo "<td>".$rs['gender']."</td>";
 echo "<td>".$rs['category']."</td>";
 echo "<td>".$rs['Branch']."</td>";
 echo "<td>".$rs['mode_of_admission']."</td></tr>";
 }
}
?>


</table>
<center>
<form action="select.php" method="POST">
Name: <input type="text" id="F1" name="F1"/>
<input type="submit" name="fetch" value="show"/></br></br></br>
Gender: <input type="text" id="F2" name="F2"/>
<input type="submit" name="search" value="find"/></br></br></br>
Category: <input type="text" id="F3" name="F3"/>
<button id="btn_search" type="button">Search</button></br></br></br>
<div id="txt_result"></div>
Branch: <input type="text" id="F4" name="F4"/>
<button id="btn_find" type="button">Search</button></br></br></br>
<div id="txt_data"></div>
</form></center>
</body>
</html>