@extends('components.home-master')



@section('content')




    <h1>{{$users->name}}</h1>
    <h2>{{$users->email}}</h2>
    <img src="/storage/images/{{$users->avatar}}" alt=""   width="170px" height="100px">


@endsection
