<html>
<head>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['login']))
unset($_SESSION['login']);
		   echo "Logged out successfully.";
header("refresh:5; url=login.php");
?>
</body>
</html>