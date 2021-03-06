@extends('components.admin-master')


@section('content')

    <h1>user profile for  : {{$user->name}}</h1>


    @if ($message = Session::get('attach'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


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






                <div class="form-group">

                    <label for="cv">
                        <textarea   name="cv">{{$user->cv}}</textarea>
                    </label>
                    @error('cv')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>

        </div>
    </div>

@endsection
