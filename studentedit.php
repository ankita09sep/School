<?php
session_start();

$dbh=new PDO ('mysql:host=localhost;dbname=firstdb', 'root', '');
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_SESSION['user']))
{
	$unique_id=$_SESSION['user'];
	if(isset($_POST['update']))
	{	

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
	
	$sql2="update admissions set applied_no='$applied_no',admission_no='$admission_no',name_candidate='$name_candidate',datepicker='$datepicker',birth_no='$birth_no',date_issue='$date_issue',religion='$religion',gender='$gender',blood_group='$blood_group',category='$category',last_school='$last_school',class='$class',
                           tc_no='$tc_no',date='$date',father_name='$father_name',father_qualification='$father_qualification',father_occupation='$father_occupation',office_no='$office_no',uid_no='$uid_no',mother_name='$mother_name',mother_qualification='$mother_qualification',mother_occupation='$mother_occupation',
						   office_no2='$office_no2',uid_no1='$uid_no',total_income='$total_income',received='$received',date2='$date2',local='$local',permanent='$permanent',residence_no='$residence_no',phone_no='$phone_no',email_id='$email_id',stud_name='$stud_name',class1='$class1',section='$section',adm='$adm',name='$name',class2='$class2',section1='$section1',adm1='$adm1',aadhar_no='$aadhar_no' where unique_id='$unique_id'";
    $abc=$dbh->prepare($sql2);
    $abc->execute();
	echo "record updated successfully";
   }  	
      $unique_id=$_SESSION['user'];
	  $sql= "select * from admissions where unique_id='$unique_id'";
	  $row = $dbh->prepare($sql);
      $row =$dbh->query($sql)->fetch(PDO::FETCH_ASSOC);



    $g=$row['gender'];
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
	  
	  

if(isset($_REQUEST['btn_pdf']))
{


// Include the main TCPDF library (search for installation path).
require_once('C:\xampp\htdocs\myweb\TCPDF-main(1)\examples\tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('AIWC Acedemy Excellence ');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// IMPORTANT: disable font subsetting to allow users editing the document
$pdf->setFontSubsetting(false);

// set font
$pdf->SetFont('helvetica', '', 10, '', false);

// add a page
$pdf->AddPage();

/*
It is possible to create text fields, combo boxes, check boxes and buttons.
Fields are created at the current position and are given a name.
This name allows to manipulate them via JavaScript in order to perform some validation for instance.
*/

// set default form properties
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));

$pdf->SetFont('helvetica', 'BI', 18);
$pdf->Cell(0, 5, 'STUDENT PROFILE', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('helvetica', '', 12);

// Applied for std
$pdf->Cell(35, 5, 'Applied for Std:',1,0,'L');
$pdf->Cell(35, 5, $row['applied_no'],1,0,'L');
$pdf->SetXY(15,45);
$pdf->Ln(6);

// Admission No
$pdf->Cell(35, 5, 'Admission No:',1,0,'L');
$pdf->Cell(35, 5, $row['admission_no'],1,0,'L');
$pdf->Ln(6);

// Name of Candidate
$pdf->Cell(50, 5, 'Name of Candidate:',1,0,'L');
$pdf->Cell(35, 5, $row['name_candidate'],1,0,'L');
$pdf->Ln(6);

// Date of Birth
$pdf->Cell(35, 5, 'Date of Birth:');
$pdf->Cell(35, 5, $row['datepicker'],1,0,'L');
$pdf->Ln(6);

// Birth Certificate
$pdf->Cell(35, 5, 'Birth Certificate:');
$pdf->Cell(35, 5, $row['birth_no'],1,0,'L');
$pdf->Ln(6);

// Date of Issue
$pdf->Cell(35, 5, 'Date of issue:');
$pdf->Cell(35, 5, $row['date_issue'],1,0,'L');
$pdf->Ln(6);

// Religion
$pdf->Cell(35, 5, 'Religion:');
$pdf->Cell(35, 5, $row['religion'],1,0,'L');
$pdf->Ln(6);

// Gender
$pdf->Cell(35, 5, 'Gender:');
$pdf->Cell(35, 5, $row['gender'],1,0,'L');
$pdf->Ln(6);

// Blood group
$pdf->Cell(35, 5, 'Blood group:');
$pdf->Cell(35, 5, $row['blood_group'],1,0,'L');
$pdf->Ln(6);

//Category
$pdf->Cell(35, 5, 'Category:');
$pdf->Cell(35, 5, $row['category'],1,0,'L');
$pdf->Ln(6);




// Name of the last school Attended(if any)
$pdf->Cell(80, 5, 'Name of the last school Attended(if any):');
$pdf->Cell(70, 5, $row['last_school'],1,0,'L');
$pdf->Ln(6);

// Class
$pdf->Cell(35, 5, 'Class:');
$pdf->Cell(35, 5, $row['class'],1,0,'L');
$pdf->Ln(6);

// TC no
$pdf->Cell(35, 5, 'TC no:');
$pdf->Cell(35, 5, $row['tc_no'],1,0,'L');
$pdf->Ln(6);

// Date 
$pdf->Cell(35, 5, 'Date:');
$pdf->Cell(35, 5, $row['datepicker'],1,0,'L');
$pdf->Ln(10);

// Father's Name
$pdf->Cell(64, 5, 'Father Name:');
$pdf->Cell(35, 5, $row['father_name'],1,0,'L');
$pdf->Ln(6);

// Father's Qualification
$pdf->Cell(64, 5, 'Father Qualification:');
$pdf->Cell(35, 5, $row['father_qualification'],1,0,'L');
$pdf->Ln(6);

// Father's Occupation
$pdf->Cell(64, 5, 'Father Occupation:');
$pdf->Cell(35, 5, $row['father_occupation'],1,0,'L');
$pdf->Ln(6);

// Office Name Address
$pdf->Cell(64, 5, 'Office Name Address:');
$pdf->Cell(35, 5, $row['office_no'],1,0,'L');
$pdf->Ln(6);

// UID NO
$pdf->Cell(35, 5, 'UID no:');
$pdf->Cell(35, 5, $row['uid_no'],1,0,'L');
$pdf->Ln(6);

// Mother's Name
$pdf->Cell(35, 5, 'Mother Name:');
$pdf->Cell(35, 5, $row['mother_name'],1,0,'L');
$pdf->Ln(6);

// Mother's Qualification
$pdf->Cell(65, 5, 'Mother Qualification:');
$pdf->Cell(35, 5, $row['mother_qualification'],1,0,'L');
$pdf->Ln(6);

// Mother's Occupation
$pdf->Cell(65, 5, 'mother Occupation:');
$pdf->Cell(35, 5, $row['mother_occupation'],1,0,'L');
$pdf->Ln(6);

// Office Name Address                 
$pdf->Cell(65, 5, 'Office Name Address:');
$pdf->Cell(35, 5, $row['office_no2'],1,0,'L');
$pdf->Ln(6);

// UID NO
$pdf->Cell(35, 5, 'UID no:');
$pdf->Cell(35, 5, $row['uid_no1'],1,0,'L');
$pdf->Ln(6);

// Total Annual Income of parents
$pdf->Cell(65, 5, 'Total Annual Income of parents:');
$pdf->Cell(40, 5, $row['total_income'],1,0,'L');
$pdf->Ln(6);

// Received with thanks from
$pdf->Cell(65, 5, 'Received with thanks from:');
$pdf->Cell(35, 5, $row['received'],1,0,'L');
$pdf->Ln(6);

// Date 
$pdf->Cell(35, 5, 'Date:');
$pdf->Cell(35, 5, $row['date2'],1,0,'L');
$pdf->Ln(10);

// Local Address
$pdf->Cell(35, 5, 'Local:');
$pdf->Cell(35, 5, $row['local'],1,0,'L');
$pdf->Ln(6);

// Permanent Address
$pdf->Cell(35, 5, 'Permanent:');
$pdf->Cell(35, 5, $row['permanent'],1,0,'L');
$pdf->Ln(6);

// Residence No
$pdf->Cell(50, 5, 'Residence No:');
$pdf->Cell(35, 5, $row['residence_no'],1,0,'L');
$pdf->Ln(6);

// Phone No
$pdf->Cell(35, 5, 'Phone No:');
$pdf->Cell(35, 5, $row['phone_no'],1,0,'L');
$pdf->Ln(6);

// E-mail ID
$pdf->Cell(35, 5, 'E-mail ID:');
$pdf->Cell(50, 5, $row['email_id'],1,0,'L');
$pdf->Ln(6);

// Student Name
$pdf->Cell(35, 5, 'Student Name:');
$pdf->Cell(35, 5, $row['stud_name'],1,0,'L');
$pdf->Ln(6);

// Class
$pdf->Cell(35, 5, 'Class:');
$pdf->Cell(35, 5, $row['class'],1,0,'L');
$pdf->Ln(6);

// Section
$pdf->Cell(35, 5, 'Section:');
$pdf->Cell(35, 5, $row['section'],1,0,'L');
$pdf->Ln(6);

// ADM No
$pdf->Cell(35, 5, 'ADM no:');
$pdf->Cell(35, 5, $row['adm'],1,0,'L');
$pdf->Ln(6);

// Name
$pdf->Cell(35, 5, 'Name:');
$pdf->Cell(35, 5, $row['name'],1,0,'L');
$pdf->Ln(6);

// Class
$pdf->Cell(35, 5, 'Class:');
$pdf->Cell(35, 5, $row['class2'],1,0,'L');
$pdf->Ln(6);

// Section
$pdf->Cell(35, 5, 'Section:');
$pdf->Cell(35, 5, $row['section1'],1,0,'L');
$pdf->Ln(6);

// ADM No
$pdf->Cell(35, 5, 'ADM no:');
$pdf->Cell(35, 5, $row['adm1'],1,0,'L');
$pdf->Ln(6);

// Aadhar No
$pdf->Cell(35, 5, 'Aadhar No:');
$pdf->Cell(35, 5, $row['aadhar_no'],1,0,'L');
$pdf->Ln(6);



$pdf->SetX(50);

// Button to validate and print
$pdf->Button('print', 30, 10, 'Print', 'Print()', array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Reset Button
$pdf->Button('reset', 30, 10, 'Reset', array('S'=>'ResetForm'), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Submit Button
$pdf->Button('submit', 30, 10, 'Submit', array('S'=>'SubmitForm', 'F'=>'http://localhost/printvars.php', 'Flags'=>array('ExportFormat')), array('lineWidth'=>2, 'borderStyle'=>'beveled', 'fillColor'=>array(128, 196, 255), 'strokeColor'=>array(64, 64, 64)));

// Form validation functions
$js = <<<EOD
function CheckField(name,message) {
    var f = getField(name);
    if(f.value == '') {
        app.alert(message);
        f.setFocus();
        return false;
    }
    return true;
}
function Print() {
    if(!CheckField('firstname','First name is mandatory')) {return;}
    if(!CheckField('lastname','Last name is mandatory')) {return;}
    if(!CheckField('gender','Gender is mandatory')) {return;}
    if(!CheckField('address','Address is mandatory')) {return;}
    print();
}
EOD;

// Add Javascript code
$pdf->IncludeJS($js);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_014.pdf', 'D');

//============================================================+
// END OF FILE
//================
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit form</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"/>
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
<section class="vh-1000" style="background-color: #233067;">

  <div class="container py-5 h-500">
    <div class="row justify-content-center align-items-center h-500">
      <div class="col-12 col-lg-15 col-xl-10">
	  <div class="p-3 mb-2 bg-info text-dark">
        <div class="card shadow-2-strong card-registration" <p style="background-color:white;" size: style="border-radius: 500px;">
          <div class="card-body p-4 p-md-5">


            <h1 class="mb-4 pb-2 pb-md-0 mb-md-5"><center><b><u>AIWC ACADEMY OF EXCELLENCE </u></b></center></h1>
<h6>Dihing Road ,Old Baridih,Jamshedpur-831017</br>
E-mail : aiwcaoe2003@gmail.com/icon</br>
Telephone : 0657-2213349</h6></br>
<center><h4><b>ADMISSION FORM(2022 -2024)</b></h4></center>
<form  method="POST">

               
              <input type="hidden" id="unique_id" name="unique_id">
			 
                
              <input type="hidden" id="password" name="password">
              
      <div class="form-group">
                <label for="text">Applied for Std:</label>
              <input type="text" class="form-control" placeholder="applied No" id="applied" name="applied" value="<?php echo $row['applied_no']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Admission No:</label>
              <input type="text" class="form-control" placeholder="admission No" id="admission" name="admission" onblur="TextChanged()" value="<?php echo $row['admission_no']; ?>"></br>
			  </div>
			 
<h7><b>(I)Particulers of the candidate:- </b></h7></br>
			  <input type="file" accept="image/*" onchange="loadFile(event)">
<img id="output"/>
<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src)
    }
  };
</script>
                 
              <div class="form-group">
                <label for="text">Name of candidate:</label>
              <input type="text" class="form-control" placeholder="Name of candidate" id="name_candidate" name="name_candidate" value="<?php echo $row['name_candidate']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="datepicker">Date of birth:</label>
              <input type="text" class="form-control"placeholder="Date of birth" id="datepicker" name="datepicker" value="<?php echo $row['datepicker']; ?>"></br>
               </div>
			   <div class="form-group">
                <label for="text">Birth Certificate no:</label>
              <input type="text" class="form-control" placeholder="Birth certificate no" id="birth_certificate" name="birth_certificate" onblur="generatepassword()"  value="<?php echo $row['birth_no']; ?>"><input type="file" name="file_upload[0]"  />
			  </div>
			  <div class="form-group">
                <label for="text">Date of issue:</label>
              <input type="date" class="form-control" placeholder="Date of issue" id="date_issue" name="date_issue" value="<?php echo $row['date_issue']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Religion:</label>
              <input type="text" class="form-control" placeholder="Religion" id="religion" name="religion" value="<?php echo $row['religion']; ?>"></br>
			  </div>
			  Gender: Male <input type="radio" id="gender" name="gender" value="male" <?php echo $mcheck; ?>> 
               Female <input type="radio" id="gender" name="gender" value="female" <?php echo $fcheck; ?>></br>
			  <div class="form-group">
                <label for="text">Blood Group:</label>
				
              <input type="text" class="form-control" placeholder="Blood Group" id="blood" name="blood" value="<?php echo $row['blood_group']; ?>"></br>
			    </div>
			  
			  <div class="form-group">
			  <label for="radio">Category:</label></br>
                SC<input type="radio" name="category" id="category" value="sc"  <?php if($row['category']=='sc'){  echo 'checked'; } ?>>  
                 ST <input type="radio" name="category" id="category" value="st" <?php  if($row['category']=='st'){echo 'checked'; } ?> >  
				 OBC <input type="radio" name="category" id="category" value="obc"  <?php if($row['category']=='obc'){echo 'checked'; } ?> >  
                  GENERAL <input type="radio" name="category" id="category" value="gen"  <?php if($row['category']=='gen'){ echo 'checked';  } ?>> 
				   EWS<input type="radio" name="category" id="category" value="ews"  <?php  if($row['category']=='ews'){echo 'checked';  } ?>> 
                  MINORITY<input type="radio" name="category" id="category" value="minority"  <?php if($row['category']=='minority'){ echo 'checked';  } ?>>  
                    </div></br>
			  <div class="form-group">
                <label for="text">Name of the last school Attended(if any):</label>
              <input type="text" class="form-control" placeholder="Name of the last school Attended(if any)" id="last_school" name="last_school" value="<?php echo $row['last_school']; ?>"></br>
			  <input type="file" name="file_upload[0]"  />
			  </div>
			  <div class="form-group">
                <label for="text">class:</label>
              <input type="text" class="form-control"  placeholder="class" id="class" name="class" value="<?php echo $row['class']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">TC no:</label>
              <input type="text" class="form-control"  placeholder="TC no" id="tc_no" name="tc_no" value="<?php echo $row['tc_no']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Date:</label>
              <input type="date" class="form-control"  placeholder="Date" id="date" name="date" value="<?php echo $row['date']; ?>"></br>
			  </div>
			  
			  <h7><b>(II)Particulers of the parents:- </b></h7></br>
			  
			   <div class="form-group">
                <label for="text">Father's Name:</label>
              <input type="text" class="form-control" placeholder="Father's Name" id="father_name" name="father_name" value="<?php echo $row['father_name']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Father's Qualification:</label>
              <input type="text" class="form-control"  placeholder="Father's Qualification" id="father_qualification" name="father_qualification" value="<?php echo $row['father_qualification']; ?>"></br>
               </div>
			   <div class="form-group">
                <label for="text">Father's occupation:</label>
              <input type="text" class="form-control"  placeholder="Father's occupation" id="father_occupation" name="father_occupation"  value="<?php echo $row['father_occupation']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Office Name_Address:</label>
              <input type="text" class="form-control"  placeholder="Office Name_Address" id="office_no" name="office_no" value="<?php echo $row['office_no']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">UID No:</label>
              <input type="text" class="form-control"  placeholder="UID No" id="uid_no" name="uid_no" value="<?php echo $row['uid_no']; ?>"></br>
			  <input type="file" name="file_upload[0]"  />
			  </div>
			  <div class="form-group">
                <label for="text">Mother's Name:</label>
              <input type="text" class="form-control" placeholder="Mother's Name" id="mother_name" name="mother_name" value="<?php echo $row['mother_name']; ?>"></br>
			 </div>
			  <div class="form-group">
                <label for="text">Mother's Qualification:</label>
				
              <input type="text" class="form-control"  placeholder="Mother's Qualification" id="mother_qualification" name="mother_qualification"  value="<?php echo $row['mother_qualification']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Mother's Occupation:</label>
              <input type="text" class="form-control"  placeholder="Mother's Occupation" id="mother_occupation" name="mother_occupation" value="<?php echo $row['mother_occupation']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Office Name_Address:</label>
              <input type="text" class="form-control"  placeholder="Office Name_Address" id="office_no2" name="office_no2" value="<?php echo $row['office_no2']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">UID No:</label>
              <input type="text" class="form-control"  placeholder="UID No" id="uid_no1" name="uid_no1"  value="<?php echo $row['uid_no1']; ?>"></br>
			  <input type="file" name="file_upload[0]"  />
			  </div>
			  <div class="form-group">
                <label for="text">Total Annual Income of Parents:</label>
              <input type="text" class="form-control"  placeholder="Total Annual Income of Parents" id="total_income" name="total_income"  value="<?php echo $row['total_income']; ?>"></br>
			  </div></br></br></br>
			  <h1 class="mb-4 pb-2 pb-md-0 mb-md-5"><center><b><u>AIWC ACADEMY OF EXCELLENCE </u></b></center></h1>
           
<h6>Dihing Road ,Old Baridih,Jamshedpur-831017</br></br></h6></br>
<div class="form-group">
                <label for="text">Received with thanks from:</label>
              <input type="text" class="form-control"  placeholder="Received with thanks from" id="received" name="received"  value="<?php echo $row['received']; ?>"></br>
                 <p style="text-align:right">Date <input type="date" id="date2" name="date2" value="<?php echo $row['date2']; ?>"></br>
				 </br></br>
				<h6 style="text-align:right">(FOR AIWC ACADEMY OF EXCELLENCE)</h6></br></br>
				
			<h7><b>(III)Address:- </b></h7></br>
			
				<div class="form-group">
                <label for="text">Local:</label>
              <input type="text" class="form-control"  placeholder="Local" id="local" name="local"  value="<?php echo $row['local']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Permanent:</label>
              <input type="text" class="form-control"  placeholder="Permanent" id="permanent" name="permanent"  value="<?php echo $row['permanent']; ?>"></br>
			  </div>
			  
			  <h7><b>(IV)Contact No of Parents:- </b></h7></br>
			
				<div class="form-group">
                <label for="text">Residence no:</label>
              <input type="text" class="form-control"  placeholder="Residence no" id="residence_no" name="residence_no"  value="<?php echo $row['residence_no']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">phone no:</label>
              <input type="text" class="form-control"  placeholder="phone_no" id="phone_no" name="phone_no"  value="<?php echo $row['phone_no']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="email">E-mail ID:</label>
              <input type="email" class="form-control"  placeholder="E-mail ID" id="email" name="email" onblur="TextChanged()"  value="<?php echo $row['email_id']; ?>"></br>
			  </div>
				
				
				<h7><b>(V)Particulars of your Child/Children persently studying in AWIC Acedemy of Excellence :- </b></h7></br>
				(i)
				<div class="form-group">
                <label for="text">Student Name:</label>
              <input type="text" class="form-control"  placeholder="name" id="stud_name" name="stud_name"  value="<?php echo $row['stud_name']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Class:</label>
              <input type="text" class="form-control"  placeholder="class" id="class1" name="class1" value="<?php echo $row['class1']; ?>"></br>
			  </div>
			  
			  <div class="form-group">
                <label for="text">Section:</label>
              <input type="text" class="form-control"  placeholder="section" id="section" name="section"  value="<?php echo $row['section']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">ADM No:</label>
              <input type="text" class="form-control"  placeholder="adm no" id="adm" name="adm"  value="<?php echo $row['adm']; ?>"></br>
			  </div></br></br>
			  (ii)
			  <div class="form-group">
                <label for="text">Name:</label>
              <input type="text" class="form-control"  placeholder="name" id="name" name="name" value="<?php echo $row['name']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">Class:</label>
              <input type="text" class="form-control"  placeholder="class" id="class2" name="class2" value="<?php echo $row['class2']; ?>"></br>
			  </div>
			  
			  <div class="form-group">
                <label for="text">Section:</label>
              <input type="text" class="form-control"  placeholder="section" id="section1" name="section1"  value="<?php echo $row['section1']; ?>"></br>
			  </div>
			  <div class="form-group">
                <label for="text">ADM No:</label>
              <input type="text" class="form-control"  placeholder="adm no" id="adm1" name="adm1"  value="<?php echo $row['adm1']; ?>"></br>
			  </div>
						  <div class="form-group">
                <label for="text">Aadhar No:</label>
              <input type="text" class="form-control"  placeholder="aadhar no" id="aadhar" name="aadhar" value="<?php echo $row['aadhar_no']; ?>"></br>
			  <input type="file" name="file_upload[0]"  />
			  </div></br></br></br>

						  
			 <div class="form-group">
                <button type="submit" class="ui-button ui-widget ui-corner-all" id="update" name="update">SUBMIT</button>
				 <button type="submit" class="ui-button ui-widget ui-corner-all" id="btn_pdf" name="btn_pdf">PDF</button>
              </div>
			  
</section>
 </form>
 </body>
 <script>
function TextChanged(){
        var admission =  document.getElementById("admission").value;
        var email =  document.getElementById("email").value; 
      
        document.getElementById("unique_id").value =  admission.substring(0, 2) +email.substring(0, 2);  
    }
</script>
<script>
function generatepassword(){
        var birth_certificate =  document.getElementById("birth_certificate").value;
      
        document.getElementById("password").value = birth_certificate.substring(0, 5); 
    }
</script>






  <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous">
	  </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
</html>
<?php
}
?>
  
