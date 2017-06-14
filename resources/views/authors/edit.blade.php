@extends('layouts.admin')
@section('title','Edit Author')
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
                        Edit Author
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
                        edit author

                            {!! Form::model($author, [
                                'method' => 'PATCH',
                                'route' => ['author.update', $author->id]
                            ]) !!}

                            <div class="form-group">
                                {!! Form::label('author_name', 'Name:', ['class' => 'control-label']) !!}
                                {!! Form::text('author_name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
                                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {{ Form::label('status', 'status') }}
                                {{ Form::select('status', array('0' => 'In-Active', '1' => 'Active'), old('status'), array('class' => 'form-control')) }}
                            </div>

                            {!! Form::submit('Update Author', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection
