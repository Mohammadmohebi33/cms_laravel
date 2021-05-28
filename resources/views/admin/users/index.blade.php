@extends('components.admin-master')


@section('content')

    <h1>all users</h1>



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
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Register date</th>
                        <th>Updated profile date</th>
                        <th>Delete</th>


                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Register date</th>
                        <th>Updated profile date</th>
                        <th>Delete</th>

                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <th>{{$user->username}}</th>

                            <td>
                                <img src="/storage/{{$user->avatar}}" height="50px">
                            </td>

                            <td>{{$user->name}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>

                            <td>
                                <form method="post" action="{{route('user.destroy' , $user->id)}}" >
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection



@section('script')

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    {{--    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>--}}

@endsection

