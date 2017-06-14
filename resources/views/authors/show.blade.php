@extends('layouts.admin')
@section('title','Show Author')
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
                        Single Author
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
                            <h1>{{ $author->author_name }}</h1>
                            <p>{{ $author->email }}</p>
                            <p>
                                @if ($author->status == 0)
                                    Blocked
                                @else
                                    Active
                                @endif
                            </p>
                            <p>{{ $author->description }}</p>
                            <h4>Books Related with {{ $author->author_name }}</h4>
                            <ul>
                                @foreach ($books->all() as $book)
                                    <li>{{ $book->book_name }}</li>
                                @endforeach
                            </ul>
                            <a href="{{ route('author.index') }}" class="btn btn-info">Back to all Authors</a>
                            <a href="{{ route('author.edit', $author->id) }}" class="btn btn-primary">Edit</a>
                            <div class="pull-right">
                                <a href="#" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection
