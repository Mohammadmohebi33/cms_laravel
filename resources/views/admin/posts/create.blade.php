@extends('components.admin-master')


@section('content')

    <h1>create</h1>

    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="entet title">
            @if($errors->has('title'))
                <p style="color: red">{{ $errors->first('title') }}</p>
            @endif
        </div>


        <div class="form-group">
            <label for="title">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image"  placeholder="entet title">
            @if($errors->has('post_image'))
                <p style="color: red">{{ $errors->first('post_image') }}</p>
            @endif
        </div>


        <div class="form-group">
            <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>
            @if($errors->has('body'))
                <p style="color: red">{{ $errors->first('body') }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
