<html>
<head>
<script src="js/jquery-3.6.0.min.js"></script>
<script>

$( function() {
	 $("#btn_search").on( "click", function() {
		 console.log("ok");
		 var prodid=$("#txt_productid").val();
		 $.get("prod_name.php", { Product_id: prodid }, function( data )
			 {
				 $( "#txt_result" ).html( data );
	   });
    });
});
</script>
</head>
<body>
Enter employee no. to search
<input type="text" id="txt_productid" name="txt_productid"/>
<button id="btn_search">Search</button>
</br>
<div id="txt_result">Waiting for click...</div>
</body>
</html>
