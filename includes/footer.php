<script type="text/javascript" src="<?=$base_url;?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/camera.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?=$base_url;?>assets/js/isotope-docs.js"></script>
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
			
		});
	</script>

</html>