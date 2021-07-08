@extends('components.home-master')


@section('content')

    <h1>Contact</h1>




    <form action="{{route('create_contact')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="entet title">
            @if($errors->has('title'))
                <p style="color: red">{{ $errors->first('title') }}</p>
            @endif
        </div>




        <div class="form-group">
            <label for="title">body</label>
            <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
            @if($errors->has('body'))
                <p style="color: red">{{ $errors->first('body') }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
