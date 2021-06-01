@extends('components.admin-master')


@section('content')

    <h1>user profile for  : {{$user->name}}</h1>


    <div class="row">
    <div class="col-sm-6">

        <form action="{{route('user.profile.update' , $user)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-4">

                <img src="/storage/images/{{$user->avatar}}" alt="" class="img-profile rounded-circle">

            </div>
            <br>


            <div class="form-group">
                <input type="file" name="avatar">
            </div>



            <div class="form-group">
                <label for="username">Username</label>
                <input type="text"
                       name="username"
                       class="form-control"
                       id="name"
                       value="{{$user->username}}"
                >
                @error('username')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
               <label for="name">Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       id="name"
                       value="{{$user->name}}"
                >
                @error('name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="email">Email</label>
                <input type="text"
                       name="email"
                       class="form-control"
                       id="name"
                       value="{{$user->email}}"
                >
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="password">Password</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       id="password"

                >
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>



            <div class="form-group">
                <label for="password-confirm">Confirm password</label>
                <input type="password"
                       name="password-confirm"
                       class="form-control"
                       id="password-confirm"
                >
                @error('password-confirm')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>

    </div>
    </div>

    <br>
    <br>


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
                                <th>slug</th>
                                <th>Attach</th>
                                <th>Detach</th>


                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>option</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>slug</th>
                                <th>Attach</th>
                                <th>Detach</th>


                            </tr>
                            </tfoot>
                            <tbody>


                            @foreach($roles as $role)
                                <tr>
                                    <th><input type="checkbox"
                                               @foreach($user->roles as $user_role)
                                                   @if($user_role->slug == $role->slug)
                                                       checked
                                                   @endif
                                               @endforeach
                                        >
                                    </th>
                                    <td>{{$role->id}}</td>
                                    <th>{{$role->name}}</th>
                                    <td>{{$role->slug}}</td>



                                    <td>

                                        <form method="post" action="{{route('users.attach' , $user)}}">
                                         @csrf
                                         @method('PUT')

                                        <input type="hidden" name="role" value="{{$role->id}}">
                                        <button class="btn btn-primary"

                                        @if($user->roles->contains($role))
                                            disabled
                                        @endif

                                        >



                                            Attach</button>


                                        </form>

                                    </td>




                                    <td>

                                        <form method="post" action="{{route('users.detach' , $user)}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="role" value="{{$role->id}}">
                                            <button class="btn btn-danger"

                                               @if(!$user->roles->contains($role))
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
