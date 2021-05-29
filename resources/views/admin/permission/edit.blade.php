@extends('components.admin-master')



@section('content')


    <h1>Edit Role : {{$permission->name}}</h1>

    <div class="row">
        <div class="col-sm-3">


            <form method="post" action="{{route('permission.update' , $permission->id)}}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$permission->name}}">
                </div>

                <button class="btn btn-primary">Update</button>
            </form>




        </div>
    </div>


    <br><br><br>


    <div class="row">

        <div class="col-sm-12">

            @if(!$roles->isEmpty())
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

                                @foreach($roles as $role)

                                    <tr>

                                        <th><input type="checkbox"
                                                   @foreach($permission->roles as $permission_role)
                                                   @if($permission_role->name  ==  $role->name)
                                                   checked
                                                @endif
                                                @endforeach
                                            ></th>
                                        <th>{{$role->id}}</th>
                                        <th>{{$role->name}}</th>
                                        <th>{{$role->slug}}</th>


                                        <td>
                                            <form method="post" action="{{route('permission.role.attach' , $permission)}}">
                                                @csrf
                                                @method('PUT')


                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-primary"

                                                        @if($permission->roles->contains($role))
                                                        disabled
                                                    @endif
                                                >
                                                    Attach</button>
                                            </form>
                                        </td>


                                        <td>
                                            <form method="post" action="{{route('permission.role.detach' , $permission)}}">
                                                @csrf
                                                @method('PUT')


                                                <input type="hidden" name="role" value="{{$role->id}}">
                                                <button class="btn btn-danger"

                                                        @if(!$permission->roles->contains($role))
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
