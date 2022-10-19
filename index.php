<!DOCTYPE html>
<html><head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<h1>Upload and Store image</h1>
<div class="wrapper">
<form action="" method="POST">
<div class="form-group">
<label for="image"> Select image file:</label>
<input type="file" name="image" class="form-control">
</div>
<input type="submit" name="submit" class="btn-primary" value="Upload">
</form>
</div>
</div>
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["filename"]));  
      $query = "INSERT INTO image(name) VALUES ('$filename')";  
      if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("Image Inserted into Database")</script>';  
      }  
 }  
 ?>   