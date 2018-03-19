
<script type="text/javascript" src="<?=$base_url;?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/camera.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/isotope-docs.js"></script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  // new google.translate.TranslateElement({includedLanguages: 'ta,en' ,pageLanguage: 'en'}, 'google_translate_element');
}
</script>
  <script>
		$(function(){
		
			$('#camera_wrap_4').camera({
				height: '400px',
				loader: 'bar',
				pagination: false,
				hover: false,
				opacityOnGrid: false,
				imagePath: '<?=$base_url;?>assets/images/'
			});
			$('.crops').isotope({
			  // options
			  itemSelector: '.crop-item',
			});
			$('.search-filter ul li').on( 'click', function() {
					$(".search-filter ul li").removeClass("active");
					$(this).addClass("active");
				  var filterValue = $(this).attr('data-filter');
				  $('.crops').isotope({ filter: filterValue });
				});

			$(".order-modal").click(function(){
				farmer_id = $(this).attr("data-farmer-id");
				crop_id = $(this).attr("data-crop-id");
				$("#myModal form input[name='farmer_id']").val(farmer_id);
				$("#myModal form input[name='crop_id']").val(crop_id);
			});
			
			$("form#OrderForm").submit(function(e){
				e.preventDefault();
				var form = $("form#OrderForm").serializeArray();
				console.log(form);
				$.ajax({
					type:"POST",
					url:"<?=$base_url;?>includes/ajax-form.php",
					data:form,
					dataType:'json',
					success:function(data)
					{
						console.log(data);
						alert(data.msg);
						if(data.status=='success')
							window.location.href= "<?=$base_url;?>orders.php";
						else
							window.location.href='';
					},
					error:function(err)
					{
						console.log(err);
					}
				});
			});
		});
	</script>
	 


</html>