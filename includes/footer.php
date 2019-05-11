<div class="myfooter">
	<p style="text-align: center">&copy; Test-Shop 2019</p>

	 <script>

     	function detailsmodal(id){
     		//alert(id);
     		var data = {"prod_id" : id};
     		jQuery.ajax({
     			url : '/test_shop/includes/detailsmodal.php',
     			method : "POST",
     			data : data,
     			success : function(data){
     				jQuery('body').prepend(data);
     				jQuery('#details-modal').modal('toggle');
     			},
     			error : function(){
     				alert("Something is wrong!");
     			}
     		});
     	}

     </script>

</div>

</body>
</html>
