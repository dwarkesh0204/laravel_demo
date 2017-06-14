<div id="sidebar" class="nav-collapse ">
	<!-- sidebar menu start-->
	<ul class="sidebar-menu" id="nav-accordion">
		<li>
			<a href="{{ url('admin/author') }}" {!! (Request::is('admin/author') || Request::is('admin/author/*')) ? 'class="active"' : '' !!} >
                <i class="fa fa-user"></i>
                <span>Author</span>
            </a>
		</li>
		<li>
			<a href="{{ url('admin/book') }}" {!! (Request::is('admin/book') || Request::is('admin/book/*')) ? 'class="active"' : '' !!} >
                <i class="fa fa-book"></i>
                <span>Book</span>
            </a>
		</li>
	</ul>
	<!-- sidebar menu end-->
</div>
