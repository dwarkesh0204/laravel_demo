@extends('layouts.admin')
@section('title','Author')
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
						Author List
						<div class="pull-right">
							<a class="btn btn-success" href="{!! url('admin/author') !!}">List of Authors</a>
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
							{!! Form::open(['route'=>'author.store','id' => 'adminform']) !!}
							    <div class="form-group">
							        {{ Form::label('author_name', 'Name') }}
							        {{ Form::text('author_name', old('author_name'), array('class' => 'form-control', 'placeholder' => 'Enter Author Name')) }}
							    </div>
							    <div class="form-group">
							        {{ Form::label('email', 'Email') }}
							        {{ Form::email('email', old('email'), array('class' => 'form-control', 'placeholder' => 'Enter Author Email')) }}
							    </div>
							    <div class="form-group">
							        {{ Form::label('description', 'description') }}
							        {{ Form::textarea('description', old('description'), array('class' => 'form-control', 'placeholder' => 'Description')) }}
							    </div>

							    <div class="form-group">
							        {{ Form::label('status', 'status') }}
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
