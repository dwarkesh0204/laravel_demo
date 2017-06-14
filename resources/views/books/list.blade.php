@extends('layouts.admin')
@section('title','Book')
@section('css')
<link href="{!! asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') !!}" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="{!! asset('css/owl.carousel.css') !!}" type="text/css">

<!--right slidebar-->
<link href="{!! asset('css/slidebars.css') !!}" rel="stylesheet">
<style type="text/css">
	table.listbooks td form {display: inline-block; margin-left: 5px;}
</style>
@endsection

@section('content')
	<section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-sm-12">
					<section class="panel panel-primary">
						<header class="panel-heading">
						Book List
						<div class="pull-right">
							<a class="btn btn-success" href="{!! url('admin/book/create') !!}">Create Book</a>
						</div>
						</header>
						<div class="panel-body">
							<table class="table listbooks">
								<thead>
									<tr>
										<th>Id</th>
										<th>Name</th>
										<th>Author</th>
										<th>Description</th>
										<th>Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($books as $book)
										<tr>
											<td>{!! $book->id !!}</td>
											<td>{!! $book->book_name !!}</td>
											<td>{!! $authorsArray[$book->author_id] !!}</td>
											<td>{!! substr($book->book_desc, 0, 10) . '...' !!}</td>
											<td>{!! $book->book_price !!}</td>
											<td>
												<a href="{{ route('book.show', $book->id) }}" class="btn btn-info">View</a>
												&nbsp;
												<a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
												 {!! Form::open([
					                                'method' => 'DELETE',
					                                'route' => ['book.destroy', $book->id]
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
