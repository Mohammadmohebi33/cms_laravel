@extends('components.admin-master')



@section('content')


    <h1>Edit Role : {{$category->name}}</h1>

    <div class="row">
        <div class="col-sm-3">
            <form method="post" action="{{route('category.update' , $category->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
                </div>

                <button class="btn btn-primary">Update</button>


            </form>

        </div>
    </div>




@endsection

