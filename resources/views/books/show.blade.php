@extends('layouts.admin')
@section('title','Show Book')
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
                        Single Book
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
                            <h1>{{ $book->book_name }}</h1>
                            <h3>Author : {{ $author->author_name }}</h3>
                            <p>Book Status :
                                @if ($book->status == 0)
                                    Blocked
                                @else
                                    Active
                                @endif
                            </p>
                            <p>Description : {{ $book->book_desc }}</p>
                            <p>Price : {{ $book->book_price }} Rs</p>
                            <hr>
                            <a href="{{ route('book.index') }}" class="btn btn-info">Back to all Books</a>
                            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-primary">Edit</a>
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
