@extends('layouts.admin')
@section('title','Author')
@section('css')
<link href="{!! asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') !!}" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="{!! asset('css/owl.carousel.css') !!}" type="text/css">

<!--right slidebar-->
<link href="{!! asset('css/slidebars.css') !!}" rel="stylesheet">
<style type="text/css">
	table.listauthors td form {display: inline-block; margin-left: 5px;}
</style>
@endsection

@section('content')
	<section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-sm-12">
					<section class="panel panel-primary">
						<header class="panel-heading">
							Author List
							@if(Session::has('flash_message'))
					            <div class="alert {{ Session::get('alert-class', 'alert-info') }}">
					                {{ Session::get('flash_message') }}
					            </div>
					        @endif
							<div class="pull-right">
								<a class="btn btn-success" href="{!! url('admin/author/create') !!}">Create Author</a>
							</div>
						</header>
						<div class="panel-body">
							<table class="table listauthors">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Description</th>
										<th>Email</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($authors as $author)
										<tr>
											<td>{!! $author->id !!}</td>
											<td>{!! $author->author_name !!}</td>
											<td>{!! substr($author->description, 0, 10) . '...' !!}</td>
											<td>{!! $author->email !!}</td>
											<td>
												<a href="{{ route('author.show', $author->id) }}" class="btn btn-info">View</a>
												&nbsp;
												<a href="{{ route('author.edit', $author->id) }}" class="btn btn-primary">Edit</a>
												{!! Form::open([
					                                'method' => 'DELETE',
					                                'route' => ['author.destroy', $author->id]
					                            ]) !!}
					                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					                            {!! Form::close() !!}
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</section>
				</div>
			</div>
		</section>
	</section>
@endsection
