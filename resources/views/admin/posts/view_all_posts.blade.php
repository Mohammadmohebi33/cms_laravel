@extends('components.admin-master')

@section('content')

    <h1>all post</h1>





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


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Owner</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Owner</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Delete</th>

                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <th>{{$post->user->name}}</th>
                        <td><a href="{{route('post.edit' , $post->id)}}"> {{$post->title}}</a></td>

                        <td>
                            <img src="/storage/images/{{$post->post_image}}" height="50px" width="70px">
                        </td>

                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <th>

                            @can('view' , $post)
                            <form method="post" action="{{route('post.destroy' , $post->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>

                            </form>

                            @endcan

                        </th>

                    </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$posts->links()}}
@endsection


@section('script')

        <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
{{--    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}

@endsection
