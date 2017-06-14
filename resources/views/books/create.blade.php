@extends('layouts.admin')
@section('title','Book')
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
						Book List
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
                            <!-- if there are creation errors, they will show here -->
							{!! Form::open(['route'=>'book.store','id' => 'adminform']) !!}
							    <div class="form-group">
							        {{ Form::label('book_name', 'Name:') }}
							        {{ Form::text('book_name', old('book_name'), array('class' => 'form-control', 'placeholder' => 'Enter Book Name')) }}
							    </div>

							    <div class="form-group">
							        {{ Form::label('book_desc', 'Description:') }}
							        {{ Form::textarea('book_desc', old('book_desc'), array('class' => 'form-control', 'placeholder' => 'Description')) }}
							    </div>

							     <div class="form-group">
							        {{ Form::label('book_price', 'Price:') }}
							        {{ Form::text('book_price', old('book_price'), array('class' => 'form-control', 'placeholder' => 'Enter Book Price')) }}
							    </div>

							    <div class="form-group">
							        {{ Form::label('author_id', 'Select Author:') }}
							        {{ Form::select('author_id', $authorsArray, old('author_id'), array('class' => 'form-control')) }}
							    </div>

							    <div class="form-group">
							        {{ Form::label('status', 'Status:') }}
							        {{ Form::select('status', array('0' => 'In-Active', '1' => 'Active'), old('status'), array('class' => 'form-control')) }}
							    </div>
							    {{ Form::hidden('task', old('hidden'), array('id' => 'task')) }}
							    {{-- Form::submit('Save', array('class' => 'btn btn-primary')) }}
							    {{ Form::submit('Save & Close', array('class' => 'btn btn-primary')) --}}
								{{ Form::button('Save', array('id' => 'save', 'class' => 'btn btn-primary'))}}
								{{ Form::button('Save & Close', array('id' => 'saveclose', 'class' => 'btn btn-primary'))}}
							{{ Form::close() }}
						</div>
					</section>
				</div>
			</div>
		</section>
	</section>
@endsection
@section('js')
<script type="text/javascript">
	jQuery(document).ready(function($) {
		jQuery('#save').click(function(event) {
			jQuery('#task').val('save');
			jQuery('#adminform').submit();
		});
		jQuery('#saveclose').click(function(event) {
			jQuery('#task').val('saveclose');
			jQuery('#adminform').submit();
		});
	});
</script>
@endsection
