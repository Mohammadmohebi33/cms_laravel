@extends('components.admin-master')


@section('content')

    <h1>Edit Post</h1>


    @if ($message = Session::get('edit'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif



    @if ($message = Session::get('delete'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif



    <form action="{{route('post.update' , $post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">title</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="" placeholder="entet title" value="{{$post->title}}">
            @if($errors->has('title'))
                <p style="color: red">{{ $errors->first('title') }}</p>
            @endif
        </div>


        <div class="form-group">
            <div><img height="100px" src="/storage/images/{{$post->post_image}}"></div>
            <label for="title">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image"  placeholder="entet title">
            @if($errors->has('post_image'))
                <p style="color: red">{{ $errors->first('post_image') }}</p>
            @endif
        </div>


        <div class="form-group">
            <textarea name="body" id="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
            @if($errors->has('body'))
                <p style="color: red">{{ $errors->first('body') }}</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>




    <div class="row">
        <div class="col-sm-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>

                                <th>option</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>create_by</th>
                                <th>Attach</th>
                                <th>Detach</th>


                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>option</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>create_by</th>
                                <th>Attach</th>
                                <th>Detach</th>


                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($categorys as $category)
                                <tr>



                                    <td><input type="checkbox"

                                               @foreach($post->category as $cat)

                                                   @if($cat->id == $category->id)
                                                       checked
                                                   @endif

                                               @endforeach


                                        ></td>
                                    <th>{{$category->id}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->user->name}}</td>

                                    <td>

                                        <form method="post" action="{{route('post.attach' , $post->id)}}">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="category" value="{{$category->id}}">
                                            <button class="btn btn-primary"

                                                    @if($post->category->contains($category))
                                                    disabled
                                                @endif

                                            >



                                                Attach</button>


                                        </form>

                                    </td>

                                    <td>

                                        <form method="post" action="{{route('post.detach' , $post->id)}}">
                                            @csrf
                                            @method('PUT')

                                            <input type="hidden" name="category" value="{{$category->id}}">
                                            <button class="btn btn-danger"

                                                    @if(!$post->category->contains($category))
                                                    disabled
                                                @endif


                                            >Detach</button>


                                        </form>

                                    </td>



                                </tr>

                            @endforeach





                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

