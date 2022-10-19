<!DOCTYPE html>
<head>
<script src="js/jquery-3.6.0.min.js"></script>
<script>
$( function() {
	 $("#btn_search").on( "click", function() {
		 console.log("ok");
		 var categ=$("#F3").val();
		 $.post("display.php", { category: categ }, function( data )
			 {
				 $( "#txt_result" ).html( data );
	   });
    });
});
</script>
</head>
<body>
<center>
Category: <input type="text" id="F3" name="F3"/>
<button id="btn_search">Search</button>
</br>
<div id="txt_result">Waiting...</div>
</center>
</body>
</html>