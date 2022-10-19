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
    <title>Admission form</title>
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
        <div class="card shadow-2-strong card-registration" <p style="background-color:pink;" size: style="border-radius: 500px;">
          <div class="card-body p-4 p-md-5">


            <h1 class="mb-4 pb-2 pb-md-0 mb-md-5"><center><b><u>AIWC ACADEMY OF EXCELLENCE </u></b></center></h1>
<h6>Dihing Road ,Old Baridih,Jamshedpur-831017</br>
E-mail : aiwcaoe2003@gmail.com/icon</br>
Telephone : 0657-2213349</h6></br>
<center><h4><b>ADMISSION FORM(2022 -2024)</b></h4></center>
<form action="log.php" method="POST">

               
              <input type="hidden" id="unique_id" name="unique_id">
			 
                
              <input type="hidden" id="password" name="password">
              
      <div class="form-group">
                <label for="text">Applied for Std:</label>
              <input type="text" class="form-control" placeholder="applied No" id="applied" name="applied">
			  </div>
			  <div class="form-group">
                <label for="text">Admission No:</label>
              <input type="text" class="form-control" placeholder="admission No" id="admission" name="admission" onblur="TextChanged()">
			  </div>
			 
<h7><b>(I)Particulers of the candidate:- </b></h7></br>
			  <input type="file" accept="image/*" id="photo_family" name="photo_family" onchange="loadFile(event)">
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
              <input type="text" class="form-control" placeholder="Name of candidate" id="name_candidate" name="name_candidate">
			  </div>
			  <div class="form-group">
                <label for="datepicker">Date of birth:</label>
              <input type="text" class="form-control"placeholder="Date of birth" id="datepicker" name="datepicker">
               </div>
			   <div class="form-group">
                <label for="text">Birth Certificate no:</label>
              <input type="text" class="form-control" placeholder="Birth certificate no" id="birth_certificate" name="birth_certificate" onblur="generatepassword()">
                <input class="form-control" type="file" id="photo_c" name="photo_c"  value="" />
            </div>
			  <div class="form-group">
                <label for="text">Date of issue:</label>
              <input type="date" class="form-control" placeholder="Date of issue" id="date_issue" name="date_issue">
			  </div>
			  <div class="form-group">
                <label for="text">Religion:</label>
              <input type="text" class="form-control" placeholder="Religion" id="religion" name="religion"></div>
			  <div class="form-group">
                <label for="radio">Gender:</label>
              <input type="radio" name="gender" id="gender" value="male"> Male
                  <input type="radio" name="gender" id="gender" value="female"> Female
                    </div></br>
			  <div class="form-group">
                <label for="text">Blood Group:</label>
				
              <input type="text" class="form-control" placeholder="Blood Group" id="blood" name="blood"></div>
			  
			  <div class="form-group">
			  <label for="radio">Category:</label></br>
                <input type="radio" name="category" id="category" value="sc"> SC
                  <input type="radio" name="category" id="category" value="st"> ST
				  <input type="radio" name="category" id="category" value="obc"> OBC
                  <input type="radio" name="category" id="category" value="general"> GENERAL
				  <input type="radio" name="category" id="category" value="ews"> EWS
                  <input type="radio" name="category" id="category" value="minority"> MINORITY
                    </div></br>
                             
			  <div class="form-group">
                <label for="text">Name of the last school Attended(if any):</label>
              <input type="text" class="form-control" placeholder="Name of the last school Attended(if any)" id="last_school" name="last_school">
                <input class="form-control" type="file" name="photo_school" id="photo_school" value="" />
            </div>
			  <div class="form-group">
                <label for="text">class:</label>
              <input type="text" class="form-control"  placeholder="class" id="class" name="class"></div>
			  <div class="form-group">
                <label for="text">TC no:</label>
              <input type="text" class="form-control"  placeholder="TC no" id="tc_no" name="tc_no"></div>
			  <div class="form-group">
                <label for="text">Date:</label>
              <input type="date" class="form-control"  placeholder="Date" id="date" name="date"></div>
			  
			  <h7><b>(II)Particulers of the parents:- </b></h7></br>
			  
			   <div class="form-group">
                <label for="text">Father's Name:</label>
              <input type="text" class="form-control" placeholder="Father's Name" id="father_name" name="father_name">
			  </div>
			  <div class="form-group">
                <label for="text">Father's Qualification:</label>
              <input type="text" class="form-control"  placeholder="Father's Qualification" id="father_qualification" name="father_qualification">
               </div>
			   <div class="form-group">
                <label for="text">Father's occupation:</label>
              <input type="text" class="form-control"  placeholder="Father's occupation" id="father_occupation" name="father_occupation">
			  </div>
			  <div class="form-group">
                <label for="text">Office Name_Address:</label>
              <input type="text" class="form-control"  placeholder="Office Name_Address" id="office_no" name="office_no">
			  </div>
			  <div class="form-group">
                <label for="text">UID No:</label>
              <input type="text" class="form-control"  placeholder="UID No" id="uid_no" name="uid_no">
			  </div>
			   <div class="form-group">
                <input class="form-control" type="file" name="photo_uid"  id="photo_uid" value="" />
            </div>
			  <div class="form-group">
                <label for="text">Mother's Name:</label>
              <input type="text" class="form-control" placeholder="Mother's Name" id="mother_name" name="mother_name"></div>
			  <div class="form-group">
                <label for="text">Mother's Qualification:</label>
				
              <input type="text" class="form-control"  placeholder="Mother's Qualification" id="mother_qualification" name="mother_qualification"></div>
			  <div class="form-group">
                <label for="text">Mother's Occupation:</label>
              <input type="text" class="form-control"  placeholder="Mother's Occupation" id="mother_occupation" name="mother_occupation"></div>
			  <div class="form-group">
                <label for="text">Office Name_Address:</label>
              <input type="text" class="form-control"  placeholder="Office Name_Address" id="office_no2" name="office_no2"></div>
			  <div class="form-group">
                <label for="text">UID No:</label>
              <input type="text" class="form-control"  placeholder="UID No" id="uid_no1" name="uid_no1">
			  </div>
			   <div class="form-group">
                <input class="form-control" type="file" name="photo_uid1"  id="photo_uid1" value="" />
            </div>
			  <div class="form-group">
                <label for="text">Total Annual Income of Parents:</label>
              <input type="text" class="form-control"  placeholder="Total Annual Income of Parents" id="total_income" name="total_income"></div></br></br></br>
			  <h1 class="mb-4 pb-2 pb-md-0 mb-md-5"><center><b><u>AIWC ACADEMY OF EXCELLENCE </u></b></center></h1>
           
<h6>Dihing Road ,Old Baridih,Jamshedpur-831017</br></br></h6></br>
<div class="form-group">
                <label for="text">Received with thanks from:</label>
              <input type="text" class="form-control"  placeholder="Received with thanks from" id="received" name="received">
                 <p style="text-align:right">Date <input type="date" id="date2" name="date2"></br></br>
				<h6 style="text-align:right">(FOR AIWC ACADEMY OF EXCELLENCE)</h6></br></br>
				
			<h7><b>(III)Address:- </b></h7></br>
			
				<div class="form-group">
                <label for="text">Local:</label>
              <input type="text" class="form-control"  placeholder="Local" id="local" name="local">
			  </div>
			  <div class="form-group">
                <label for="text">Permanent:</label>
              <input type="text" class="form-control"  placeholder="Permanent" id="permanent" name="permanent"></div>
			  
			  <h7><b>(IV)Contact No of Parents:- </b></h7></br>
			
				<div class="form-group">
                <label for="text">Residence no:</label>
              <input type="text" class="form-control"  placeholder="Residence no" id="residence_no" name="residence_no">
			  </div>
			  <div class="form-group">
                <label for="text">phone no:</label>
              <input type="text" class="form-control"  placeholder="phone_no" id="phone_no" name="phone_no">
			  </div>
			  <div class="form-group">
                <label for="email">E-mail ID:</label>
              <input type="email" class="form-control"  placeholder="E-mail ID" id="email" name="email" onblur="TextChanged()"></div>
				
				
				<h7><b>(V)Particulars of your Child/Children persently studying in AWIC Acedemy of Excellence :- </b></h7></br>
				(i)
				<div class="form-group">
                <label for="text">Student Name:</label>
              <input type="text" class="form-control"  placeholder="name" id="stud_name" name="stud_name">
			  </div>
			  <div class="form-group">
                <label for="text">Class:</label>
              <input type="text" class="form-control"  placeholder="class" id="class1" name="class1"></div>
			  
			  <div class="form-group">
                <label for="text">Section:</label>
              <input type="text" class="form-control"  placeholder="section" id="section" name="section">
			  </div>
			  <div class="form-group">
                <label for="text">ADM No:</label>
              <input type="text" class="form-control"  placeholder="adm no" id="adm" name="adm"></div></br></br>
			  (ii)
			  <div class="form-group">
                <label for="text">Name:</label>
              <input type="text" class="form-control"  placeholder="name" id="name" name="name">
			  </div>
			  <div class="form-group">
                <label for="text">Class:</label>
              <input type="text" class="form-control"  placeholder="class" id="class2" name="class2"></div>
			  
			  <div class="form-group">
                <label for="text">Section:</label>
              <input type="text" class="form-control"  placeholder="section" id="section1" name="section1">
			  </div>
			  <div class="form-group">
                <label for="text">ADM No:</label>
              <input type="text" class="form-control"  placeholder="adm no" id="adm1" name="adm1"></div>
						  <div class="form-group">
                <label for="text">Aadhar No:</label>
              <input type="text" class="form-control"  placeholder="aadhar no" id="aadhar" name="aadhar"><input type="file" name="file_upload[0]"  />
			  </div></br></br></br>

						  
			 <div class="form-group">
                <button class="ui-button ui-widget ui-corner-all" id="sub" name="sub">SUBMIT</button>
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
  