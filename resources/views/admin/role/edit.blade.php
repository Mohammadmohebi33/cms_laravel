@extends('components.admin-master')



@section('content')


    <h1>Edit Role : {{$role->name}}</h1>

    <div class="row">
    <div class="col-sm-3">
    <form method="post" action="{{route('role.update' , $role->id)}}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}">
        </div>

        <button class="btn btn-primary">Update</button>


    </form>

    </div>
    </div>


    <br><br><br>


    <div class="row">

        <div class="col-sm-12">

            @if(!$permissions->isEmpty())
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>

                                <th>Option</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>



                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Option</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attach</th>
                                <th>Detach</th>


                            </tr>
                            </tfoot>
                            <tbody>


                            @foreach($permissions as $permission)

                                <tr>


                                <th><input type="checkbox"
                                    @foreach($role->permissions as $role_permission)
                                        @if($role_permission->name  ==  $permission->name)
                                            checked
                                        @endif
                                    @endforeach
                                    ></th>
                                <th>{{$permission->id}}</th>
                                <th>{{$permission->name}}</th>
                                <th>{{$permission->slug}}</th>


                                    <td>
                                        <form method="post" action="{{route('role.permission.attach' , $role)}}">
                                            @csrf
                                            @method('PUT')


                                            <input type="hidden" name="permission" value="{{$permission->id}}">
                                            <button class="btn btn-primary"

                                                    @if($role->permissions->contains($permission))
                                                    disabled
                                                    @endif
                                            >
                                                Attach</button>
                                        </form>
                                    </td>




                                    <td>
                                        <form method="post" action="{{route('role.permission.detach' , $role)}}">
                                            @csrf
                                            @method('PUT')


                                            <input type="hidden" name="permission" value="{{$permission->id}}">
                                            <button class="btn btn-danger"

                                                    @if(!$role->permissions->contains($permission))
                                                    disabled
                                                @endif
                                            >
                                                Detach</button>
                                        </form>
                                    </td>


                                </tr>


                            @endforeach






                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif


        </div>

    </div>


@endsection
