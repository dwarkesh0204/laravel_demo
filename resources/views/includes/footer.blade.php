 <!--footer start-->
<footer class="site-footer">
  <div class="text-center">
      2013 &copy; FlatLab by VectorLab.
      <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
      </a>
  </div>
</footer>
<!--footer end-->

<!-- js placed at the end of the document so the pages load faster -->
<script src="{!! asset('js/jquery.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script class="include" type="text/javascript" src="{!! asset('js/jquery.dcjqaccordion.2.7.js') !!}"></script>
<script src="{!! asset('js/jquery.scrollTo.min.js') !!}"></script>
<script src="{!! asset('js/jquery.nicescroll.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/jquery.sparkline.js') !!}" type="text/javascript"></script>
<script src="{!! asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') !!}"></script>
<script src="{!! asset('js/owl.carousel.js') !!}" ></script>
<script src="{!! asset('js/jquery.customSelect.min.js') !!}" ></script>
<script src="{!! asset('js/respond.min.js') !!}" ></script>

<!--right slidebar-->
<script src="{!! asset('js/slidebars.min.js') !!}"></script>

<!--common script for all pages-->
<script src="{!! asset('js/common-scripts.js') !!}"></script>

<!--script for this page-->
<script src="{!! asset('js/sparkline-chart.js') !!}"></script>
<script src="{!! asset('js/easy-pie-chart.js') !!}"></script>
<script src="{!! asset('js/count.js') !!}"></script>

<script>
	//owl carousel
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			navigation : true,
			slideSpeed : 300,
			paginationSpeed : 400,
			singleItem : true,
			autoPlay:true

		});
	});
	//custom select box

	$(function(){
		$('select.styled').customSelect();
	});
</script>
@yield('js')


<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
<![endif]-->
