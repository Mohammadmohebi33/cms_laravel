@extends('components.admin-master')



@section('content')

    <h1>Contact :</h1>




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
                                <th>title</th>
                                <th>body</th>
                                <th>Delete</th>


                            </tr>
                            </thead>
                            <tfoot>
                            <tr>

                                <th>Id</th>
                                <th>Owner</th>
                                <th>title</th>
                                <th>body</th>
                                <th>Delete</th>


                            </tr>
                            </tfoot>
                            <tbody>

                            @foreach($contacts as $contact)

                                <tr>

                                    <td>{{$contact->id}}</td>
                                    <td>{{$contact->user->name}}</td>
                                    <td>{{$contact->title}}</td>
                                    <td>{{$contact->body}}</td>
                                    <th>
                                        <form method="post" action="{{route('desryoy_contact'    ,   $contact->id)}}">
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

