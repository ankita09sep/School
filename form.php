<html>
<head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      showButtonPanel: true
    });
	    $( "#format" ).on( "change", function() {
      $( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
    });
  });
  $( function() {
    $( "input" ).checkboxradio();
  });
</script>
</head>
<body>


<?php
session_start();
    if(!isset($_SESSION['login']))
    {
	   header("refresh:5; url=login.php");
	   die('Unauthorized access. Redirecting to login page in 5 sec.....');
     }
	 
?>


<?php
	try
	{
	  $dbh = new PDO ('mysql:host=localhost;dbname=firstdb', 'root', '');
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
if(isset($_POST["sub"]))
  {
	$name=$_POST["F1"];
    $fathers_name=$_POST["F2"];
    $mothers_name=$_POST["F3"];
    $dob=$_POST["datepicker"];
    $gender=$_POST["F5"];
    $category=$_POST["F6"];
	$branch=$_POST["F7"];
	$moa=$_POST["F8"];
	
$sql= "insert into student(name, father_name, mother_name, dob, gender, category, branch, mode_of_admission)
values('$name', '$fathers_name', '$mothers_name', '$dob', '$gender', '$category', '$branch', '$moa')";
  
  
  $abc = $dbh->prepare($sql);
      $abc->execute();
	  echo "data inserted";
  }
	}
	catch  (Exception $x) 
	{
	echo "Some error ".$x->getmessage();
	}
?>



<center><u><h1>APPLICATION FORM</h1></u><br>
<form action="form.php" method="POST">
Name: <input type="text" id="F1" name="F1"><br>
Father's Name: <input type="text" id="F2" name="F2"><br>
Mother's Name: <input type="text" id="F3" name="F3"><br>
D.O.B.: <input type="text" id="datepicker" name="datepicker">&nbsp;&nbsp;
Format options:
	<select id="format">
	<option value="mm/dd/yy">Default - mm/dd/yy</option>
    <option value="yy-mm-dd">ISO 8601 - yy-mm-dd</option>
	  </select><br>
<div class="widget">
Gender: Male <input type="radio" id="F5" name="F5" value="male"> 
        Female <input type="radio" id="F5" name="F5" value="female"><br>
Category: ST <input type="radio" id="F6" name="F6" value="st"> 
          SC <input type="radio" id="F6" name="F6" value="sc"> 
		  OBC <input type="radio" id="F6" name="F6" value="obc"> 
		  GEN <input type="radio" id="F6" name="F6" value="gen"><br>
Branch: <select id="F7" name="F7">
<option value="ME">ME</option>
<option value="CE">CE </option>
<option value="EE">EE</option>
<option value="CSE">CSE</option>
<option value="ECE">ECE</option>
</select><br>
Mode of admission: <input type="text" id="F8" name="F8"><br>
  <button class="ui-button ui-widget ui-corner-all" name="sub">
    SUBMIT
  </button>
</form></center>
</body>
</html>