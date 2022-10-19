<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"/>   
</head>

<body>
<?php
$dbh=new PDO ('mysql:host=localhost;dbname=firstdb', 'root', '');

     if(isset($_POST["signup"]))
     {
         $id=$_POST["ID"];
         $pswd=$_POST["PSWD"];
         $type=$_POST["type"]; 

     $sql="insert into adm_login(id, pswd, type) values('$id', '$pswd','$type')";
     $link=$dbh->prepare($sql);
     $link->execute();
      echo "new userid created";
}
?>
<section class="vh-1000" style="background-color: #233067;">

  <div class="container py-5 h-500">
    <div class="row justify-content-center align-items-center h-500">
      <div class="col-12 col-lg-15 col-xl-10">
	  <div class="p-3 mb-2 bg-info text-dark">
        <div class="card shadow-2-strong card-registration" <p style="background-color:pink;" size: style="border-radius: 500px;">
          <div class="card-body p-4 p-md-5">
<h1><center><u><b> AWIC ACADEMY OF EXCELLENCE </b></u></center></h1>
<form action="admsignup.php" method="POST">
<center>   <b>ID:</b> <input type="text" id="ID" name="ID">
           <b>PSWD:</b> <input type="password" id="PSWD" name="PSWD">
             <select name="type" id="type"> <option value="admin"> Admin </option> 
	                                        <option value="others"> Others </option> </select></br></br>
           <input type="submit" name="signup" value="SignUp">  </center>
</form>
 <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
</body>
</html>