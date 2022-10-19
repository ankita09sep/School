<html>
<head>
<script src="js/jquery-3.6.0.min.js"></script>
<script language="javascript">
$(function()  {
     $("#btn_search").on("click", function()  {
		 console.log("ok");
		 var prodid=$("#txt_productid").val();
		 $.post("jsonpage.php", { Product_id:prodid }, function( data ) {
			console.log(data.length);
			$(  "#txt_result"  ).html( data[0].Product_name+" Amt. "+data[0].Price );
		});
	 });
});
</script>
</head>
<body>
Enter product id to search
<input type="text" id="txt_productid" name="txt_productid"/>
<button id="btn_search">Search</button>
</br>
<div id="txt_result">Waiting for click...</div>
</body>
</html>
