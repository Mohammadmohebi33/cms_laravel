@extends('components.home-master')

@section('content')


    <!-- Title -->
    <h1 class="mt-4">{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by
        <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="/storage/images/{{$post->post_image}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <blockquote class="blockquote">


    </blockquote>



    <hr>


    @if(Auth::check())
    <!-- Comments Form -->
    @include('comments.form-comment')

    @else
    <h1>You must first login to post a comment.</h1>
    @endif




    <!-- Single Comment -->
    @include('comments.main-comment')

    <!-- Comment with nested comments -->
    {{--   @include('comments.nested-comment')--}}


@endsection
