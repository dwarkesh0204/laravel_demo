@extends('layouts.admin')
@section('title','Edit Book')
@section('css')
	<link href="{!! asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') !!}" rel="stylesheet" type="text/css" media="screen"/>
	<link rel="stylesheet" href="{!! asset('css/owl.carousel.css') !!}" type="text/css">
	<link href="{!! asset('css/slidebars.css') !!}" rel="stylesheet">
@endsection

@section('content')
	<section id="main-content">
		<section class="wrapper">
			<div class="row">
				<div class="col-sm-12">
					<section class="panel panel-primary">
						<header class="panel-heading">
						Edit Book
						<div class="pull-right">
							<a class="btn btn-success" href="{!! url('admin/book') !!}">List of Books</a>
						</div>
						</header>
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<div class="panel-body">
							{!! Form::model($book, [
								'method' => 'PATCH',
								'route' => ['book.update', $book->id]
							]) !!}

							<div class="form-group">
								{!! Form::label('book_name', 'Name:', ['class' => 'control-label']) !!}
								{!! Form::text('book_name', null, ['class' => 'form-control']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('book_desc', 'Description:', ['class' => 'control-label']) !!}
								{!! Form::textarea('book_desc', null, ['class' => 'form-control']) !!}
							</div>

							<div class="form-group">
								{!! Form::label('book_price', 'Price:', ['class' => 'control-label']) !!}
								{!! Form::textarea('book_price', null, ['class' => 'form-control']) !!}
							</div>

							<div class="form-group">
							        {{ Form::label('author_id', 'Select Author:') }}
							        {{ Form::select('author_id', $authorsArray, old('author_id'), array('class' => 'form-control')) }}
							    </div>

							<div class="form-group">
								{{ Form::label('status', 'Status:') }}
								{{ Form::select('status', array('0' => 'In-Active', '1' => 'Active'), old('status'), array('class' => 'form-control')) }}
							</div>

							{!! Form::submit('Update Book', ['class' => 'btn btn-primary']) !!}

							{!! Form::close() !!}
						</div>
					</section>
				</div>
			</div>
		</section>
	</section>
@endsection
