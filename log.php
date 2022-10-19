<?php
session_start();
	try
	{
	  $dbh = new PDO ('mysql:host=localhost;dbname=firstdb', 'root', '');
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
if(isset($_POST["sub"]))
  {
	$unique_id=$_POST["unique_id"];
	$password=$_POST["password"];
	$applied_no=$_POST["applied"];
	$admission_no=$_POST["admission"];
    $name_candidate=$_POST["name_candidate"];
    $datepicker=$_POST["datepicker"];
	$birth_no=$_POST["birth_certificate"];	
    $date_issue=$_POST["date_issue"];
	$religion=$_POST["religion"];	
    $gender=$_POST["gender"];
	$blood_group=$_POST["blood"];	
    $category=$_POST["category"];
	$last_school=$_POST["last_school"];
	$class=$_POST["class"];
    $tc_no=$_POST["tc_no"]; 
	$date=$_POST["date"];	
	$father_name=$_POST["father_name"];
	$father_qualification=$_POST["father_qualification"];
	$father_occupation=$_POST["father_occupation"];
	$office_no=$_POST["office_no"];	
    $uid_no=$_POST["uid_no"];
	$mother_name=$_POST["mother_name"];
	$mother_qualification=$_POST["mother_qualification"];
	$mother_occupation=$_POST["mother_occupation"];
	$office_no2=$_POST["office_no2"];	
    $uid_no1=$_POST["uid_no1"];
	$total_income=$_POST["total_income"];
	$received=$_POST["received"];
	$date2=$_POST["date2"];
	$local=$_POST["local"];
	$permanent=$_POST["permanent"];	
    $residence_no=$_POST["residence_no"];
	$phone_no=$_POST["phone_no"];
	$email_id=$_POST["email"];
	$stud_name=$_POST["stud_name"];
	$class1=$_POST["class1"];	
    $section=$_POST["section"];
	$adm=$_POST["adm"];
	$name=$_POST["name"];
	$class2=$_POST["class2"];	
	$section1=$_POST["section1"];
	$adm1=$_POST["adm1"];
	$aadhar_no=$_POST["aadhar"];



	 
$sql= "insert into admissions(unique_id,password,applied_no,admission_no,name_candidate,datepicker,birth_no,date_issue,religion,gender,blood_group,category,last_school,class,
                           tc_no,date,father_name,father_qualification,father_occupation,office_no,uid_no,mother_name,mother_qualification,mother_occupation,
						   office_no2,uid_no1,total_income,received,date2,local,permanent,residence_no,phone_no,email_id,stud_name,class1,section,adm,name,class2,section1,adm1,aadhar_no) values('$unique_id','$password','$applied_no','$admission_no','$name_candidate','$datepicker','$birth_no','$date_issue','$religion','$gender','$blood_group','$category','$last_school','$class','$tc_no','$date','$father_name','$father_qualification'
                           ,'$father_occupation','$office_no','$uid_no','$mother_name','$mother_qualification','$mother_occupation','$office_no2','$uid_no1','$total_income','$received','$date2','$local','$permanent','$residence_no','$phone_no',
						   '$email_id','$stud_name','$class1','$section','$adm','$name','$class2','$section1','$adm1','$aadhar_no')";
  
  
  $abc = $dbh->prepare($sql);
      $abc->execute();
	  $_SESSION['user']=$unique_id;
	  echo "data inserted";
		header("location:studentedit.php");
  }
	}
	catch  (Exception $x) 
	{
	echo "Some error ".$x->getmessage();
	}
?>






