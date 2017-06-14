<!DOCTYPE html>
<html lang="en">
	<head>
		@include('includes.head')
	</head>
	<body>
		<section id="container" >
			<!--header start-->
			<header class="header white-bg">
				@include('includes.header')
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>
				@include('includes.left-sidebar')
			</aside>
			@yield('content')
			<!-- Right Slidebar start -->
			@include('includes.right-sidebar')
			<!-- Right Slidebar end -->
			<!-- Footer -->
			@include('includes.footer')
			<!-- Footer end-->
		</section>
	</body>
</html>
