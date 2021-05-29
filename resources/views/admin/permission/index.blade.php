@extends('components.admin-master')



@section('content')

    <h1>Permissions:</h1>


    <div class="row">

        <div class="col-sm-3">

            <form action="{{route('permission.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid  @enderror" name="name">

                    <div>
                        @error('name')
                        <span><strong>{{$message}}</strong></span>
                        @enderror
                    </div>

                    <br>
                    <button type="submit" class="btn btn-primary btn-block">create</button>
                </div>

            </form>


        </div>





    <div class="col-sm-9">

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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>



                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Delete</th>


                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($permissions as $permission)

                            <tr>

                                <td>{{$permission->id}}</td>
                                <td><a href="{{route('permission.edit' , $permission->id)}}">{{$permission->name}}</a></td>
                                <td>{{$permission->slug}}</td>

                                <th>

                                    <form method="post" action="{{route('permission.destroy' , $permission->id)}}">
                                        @csrf
                                        @method('DELETE')


                                        <button class="btn btn-danger">Delete</button>
                                    </form>

                                </th>


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
