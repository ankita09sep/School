<html>
<head></head>
<body>
<h2>1.List of employees older than manager.</h2>
<table border="1">
<tr><th>Employee name</th><th>Dob</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=company','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT * FROM emp w,
                       emp m
					    WHERE w.emp_no=m.manager_id
						 AND w.dob> m.dob");
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						 echo"<tr><td>".$rs['emp_name']."</td>";
						 echo"<td>".$rs['dob']."</td></tr>";
					 }
						 
?>
</table>


<h2>2.List of employee getting higher salary than avg. salary of his/her dept.</h2>
<table border="1">
<tr><th>Employee name</th><th>Salary</th><th>Department name</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=company','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT * FROM emp
                   JOIN dept ON emp.dept_no=dept.dept_no
				   WHERE emp.salary >(SELECT AVG(salary) FROM emp WHERE emp.dept_no= dept.dept_no)");
				   $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						 echo"<tr><td>".$rs['emp_name']."</td>";
						 echo"<td>".$rs['salary']."</td>";
						  echo"<td>".$rs['dept_name']."</td></tr>";
					 }
						 
?>
</table>
				   

<h2>3.List of all employee along with their salary and manager name with their salary grade.</h2>
<table border="1">
<tr><th>Employee name</th><th>Salary</th><th>Manager</th><th>Grade</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=company','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT emp1.emp_name AS Employee, emp1.salary, emp2.emp_name AS manager_id, salary_grade.grade
                    FROM emp emp1 
					JOIN emp emp2 ON emp1.manager_id=emp2.emp_no
					JOIN salary_grade WHERE emp1.salary BETWEEN salary_grade.min_salary AND salary_grade.max_salary");
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 { 
						 echo"<tr><td>".$rs['Employee']."</td>";
						 echo"<td>".$rs['salary']."</td>";
						 echo"<td>".$rs['manager_id']."</td>";
						 echo"<td>".$rs['grade']."</td></tr>";
					 }
						 
?>
</table>

<h2>4.Dept wise max and min salary.</h2>
<table border="1">
<tr><th>Department</th><th>min</th><th>max</th></tr>
<?php
$dbh=new PDO('mysql:host=localhost;dbname=company','root','');
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$stmt=$dbh->prepare("SELECT dept.dept_no,dept.dept_name, MIN(salary) AS min_salary, MAX(salary) AS max_salary
                     FROM emp
					 JOIN dept ON dept.dept_no=emp.dept_no
					 GROUP BY dept_no");
                     $stmt->execute();
					 $rows=$stmt->fetchAll();
					 foreach($rows as $rs)
					 {
						 echo"<tr><td>".$rs['dept_name']."</td>";
						 echo"<td>".$rs['min_salary']."</td>";
						 echo"<td>".$rs['max_salary']."</td></tr>";
					 }
						 
?>
</table>
</body>
</html>

