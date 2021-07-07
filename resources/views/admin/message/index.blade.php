@extends('components.admin-master')



@section('content')

    <h1>Messages :</h1>



    <div class="row">
        <div class="col-sm-7">


            <form action="{{route('message.store')}}" method="post">
                @csrf

                <div class="form-group">


                    <textarea class="form-control"  name="message"></textarea>


                    <div>
                        @error('message')
                        <span style="color: red"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>

                    <select name="to">
                        @foreach($users    as      $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>





                    <br>
                    <button type="submit" class="btn btn-primary btn-block">send</button>


                </div>
            </form>
        </div>
    </div>



    <div    class="row">
        <div class="col-sm-12">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables message</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>


                            <tr>
                                <th>Id</th>
                                <th>send by</th>
                                <th>image</th>
                                <th>message</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tfoot>

                            <tr>
                            <th>Id</th>
                            <th>send by</th>
                                <th>image</th>
                            <th>message</th>
                            <th>Delete</th>


                            </tr>


                            </tfoot>
                            <tbody>







                            @foreach($messages as $message)

                                <tr>

                                    <td>{{$message->id}}</td>
                                    <td>{{$message->user->name}}</td>
                                    <td><img src="/storage/images/{{$message->user->avatar}}"></td>
                                    <td>{{$message->message}} </td>

                                    <td>


                                        <form method="post" action="{{route('message.destroy' , $message->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>


                                    </td>





                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>






@endsection

