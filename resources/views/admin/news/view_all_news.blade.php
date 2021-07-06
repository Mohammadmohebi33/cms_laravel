@extends('components.admin-master')



@section('content')

    <h1>News :</h1>


    @if ($message = Session::get('create'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif




    @if ($message = Session::get('remove'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif



    <div class="row">

        <div class="col-sm-12">




            <form action="{{route('create_news')}}" method="post">
                @csrf

                <div class="form-group">





                        <textarea class="form-control"  name="body"></textarea>



                    <div>
                        @error('name')
                        <span style="color: red"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>


                    <br>
                    <button type="submit" class="btn btn-primary btn-block">create</button>


                </div>
            </form>

        </div>
    </div>





        <div    class="row">
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
                                    <th>Id</th>
                                    <th>Owner</th>
                                    <th>body</th>
                                    <th>Delete</th>
                                    <th>update</th>



                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Owner</th>
                                    <th>body</th>
                                    <th>Delete</th>
                                    <th>update</th>

                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($news as $new)

                                    <tr>

                                        <td>{{$new->id}}</td>
                                        <td>{{$new->user->name}}</td>
                                        <td>{{$new->body}} </td>
                                        <th>
                                            <form method="post" action="{{route('delete_new' , $new->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Delete</button>
                                            </form>
                                        </th>
                                        <th><a  class="btn  btn-warning" href="{{route('updatenew'  ,   $new->id)}}">Update</a></th>


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
