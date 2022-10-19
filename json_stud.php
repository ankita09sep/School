<html>
<head>
<script src="js/jquery-3.6.0.min.js"></script>
<script language="javascript">
$(function()  {
     $("#btn_search").on("click", function()  {
		 console.log("ok");
		 var studname=$("#txt_stud").val();
		 $.post("stud_display.php", { name: studname }, function( data ) {
			console.log(data.length);
			$( "#Fname" ).val( data[0].father_name );
			$( "#Mname" ).val( data[0].mother_name );
			$( "#DOB" ).val( data[0].dob );
		});
	 });
});
</script>
</head>
<body>
Enter name to search
<input type="text" id="txt_stud" name="txt_stud"/>
<button id="btn_search">Search</button>
</br>
Father Name: <input type="text" id="Fname" name="Fname"/>
Mother Name: <input type="text" id="Mname" name="Mname"/>
D.O.B.:  <input type="date" id="DOB" name="DOB" value="DOB"/>
</body>
</html>