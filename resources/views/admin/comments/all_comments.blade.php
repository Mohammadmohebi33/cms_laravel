@extends('components.admin-master')



@section('content')


  <h1>Comments :</h1>


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
                              <th>option</th>
                              <th>Id</th>
                              <th>Owner</th>
                              <th>comment</th>
                              <th>accept</th>
                              <th>deaccept</th>



                          </tr>
                          </thead>
                          <tfoot>
                          <tr>
                              <th>option</th>
                              <th>Id</th>
                              <th>Owner</th>
                              <th>comment</th>
                              <th>accept</th>
                              <th>deaccept</th>

                          </tr>
                          </tfoot>
                          <tbody>


                          @foreach($comments as $comment)
                              <tr>

                                  <th><input type="checkbox"
                                             @if($comment->accept   ==  true)

                                             checked
                                             @endif
                                      >
                                  </th>
                                  <td>{{$comment->id}}</td>
                                  <td>{{$comment->user->name}}</td>
                                  <td>{{$comment->comment}}</td>

                                  <td>

                                      <form method="post" action="{{route('accept' ,   $comment->id)}}">
                                          @csrf
                                          @method('PUT')


                                          <button class="btn btn-primary"

                                                  @if($comment->accept   ==  1   )
                                                  disabled
                                              @endif

                                          >



                                              Attach</button>


                                      </form>

                                  </td>

                                  <td>



                                      <form method="post" action="{{route('disable'  ,   $comment->id)}}">
                                          @csrf
                                          @method('PUT')


                                          <button class="btn btn-danger"

                                                  @if($comment->accept   ==  0   )
                                                  disabled
                                              @endif

                                          >



                                              deatach</button>


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
