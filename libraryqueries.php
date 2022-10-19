<html>
<head>
</head>
<body>
<h2>1.List of all books with publisher.</h2>
<table border="1">
<tr><th>Title of Book</th><th>Publisher</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT bookmast.title, publishers.pub_name
                     FROM bookmast
                     LEFT JOIN publishers ON bookmast.pub_id = publishers.pub_id
                     ORDER BY bookmast.title");
					 $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						 echo"<tr><td>".$rs['title']."</td>";
						 echo"<td>".$rs['pub_name']."</td></tr>";
					 }
						 
?>
</table></br></br>
<h2>2.List of all books with publisher and author.</h2>
<table border="1">
<tr><th>Title of Book</th><th>Publisher</th><th>Author</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT bookmast.title, publishers.pub_name,authors.author_name
                     FROM bookmast
                     LEFT JOIN publishers ON bookmast.pub_id = publishers.pub_id
					 LEFT JOIN book_author ON bookmast.book_id = book_author.book_id
					 LEFT JOIN authors ON book_author.author_id = authors.author_id
                     ORDER BY bookmast.title");
					 $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						 echo"<tr><td>".$rs['title']."</td>";
						 echo"<td>".$rs['pub_name']."</td>";
						 echo"<td>".$rs['author_name']."</td></tr>";
					 }
						 
?>
</table>	
<h2>3.List of publisher along with no of books published.</h2>
<table border="1">
<tr><th>Publisher</th><th>No.of books</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT publishers.pub_name,
                    COUNT(bookmast.pub_id)As countofBooks
                    FROM publishers
                    LEFT JOIN bookmast ON bookmast.pub_id=publishers.pub_id
                    GROUP BY publishers.pub_name");
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						 echo"<tr><td>".$rs['pub_name']."</td>";
						 echo"<td>".$rs['countofBooks']."</td></tr>";
					 }
?>
</table>
<h2>4.List of authors along with no of books authored.</h2>
 <table border="1">
<tr><th>Author</th><th>No.of books</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT authors.author_name,
                    COUNT(book_author.author_id)As countofBooks
                    FROM authors
                    LEFT JOIN book_author ON book_author.author_id=authors.author_id
                    GROUP BY authors.author_name");
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						 echo"<tr><td>".$rs['author_name']."</td>";
						 echo"<td>".$rs['countofBooks']."</td></tr>";
					 }
?>
</table>

 <h2>5.List of books issued along with member name ordered by date of issue.</h2>
<table border="1">
 <tr><th>Book Issue</th><th>Member Name</th><th> Date of Issue</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT bookmast.title, members.member_name, issue_reg.issue_dt
                    FROM issue_reg	
	                LEFT JOIN bookmast ON bookmast.book_id=issue_reg.book_id
					LEFT JOIN members ON members.member_id=issue_reg.member_id
					ORDER BY issue_reg.issue_dt");					
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
                         echo"<tr><td>".$rs['title']."</td>";
						 echo"<td>".$rs['member_name']."</td>";
						 echo"<td>".$rs['issue_dt']."</td></tr>";
					 }
?>
</table>
<h2>6.Which publisher has published most number of books.</h2>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT publishers.pub_name,COUNT(bookmast.pub_id) AS countno
                     FROM  publishers
					 JOIN bookmast ON bookmast.pub_id=publishers.pub_id 
					 GROUP BY publishers.pub_id
					 ORDER BY countno DESC LIMIT 1");      
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {

					 }
                     echo $rs['pub_name'];



?>
 <h2>7.Which author has written most number of books</h2>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT authors.author_name,COUNT(book_author.author_id) AS countauthor
                     FROM  authors
					 JOIN book_author ON book_author.author_id=authors.author_id 
					 GROUP BY authors.author_id
					 ORDER BY countauthor DESC LIMIT 1");      
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {

					 }
                        echo $rs['author_name'];
					 
?>
<h2>8.Which member has issued most number of books</h2>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT members.member_name,COUNT(issue_reg.member_id) AS countmember
                     FROM  members
					 JOIN issue_reg ON issue_reg.member_id=members.member_id 
					 GROUP BY members.member_id
					 ORDER BY countmember DESC LIMIT 1");      
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {

					 }
                        echo $rs['member_name'];
					 
?>

      
<h2>9.What is the last book purchased.</h2>
 <?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT  bookmast.title,purchase_dt
                     FROM bookmast
                     ORDER BY purchase_dt DESC LIMIT 1");				 
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						echo $rs['title']."purchase on ".$rs['purchase_dt'];
					 }
?>
<h2>10.First book issued as per date.</h2>
 <?php
$dbh=new PDO('mysql:host=localhost;dbname=library','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT  bookmast.title,issue_reg.issue_dt
                     FROM bookmast 
					 INNER JOIN issue_reg ON bookmast.book_id=issue_reg.book_id
                     ORDER BY issue_dt ASC LIMIT 1");					 
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						echo $rs['title']. "issue on ".$rs['issue_dt'];
					 }
?>

	</body>
	</html>
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	
	