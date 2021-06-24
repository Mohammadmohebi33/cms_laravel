@extends('components.admin-master')



@section('content')

    <h1>Update New :</h1>


    <div class="row">

        <div class="col-sm-12">




            <form action="{{route('upgrade'  ,   $news->id)}}"  method="post">
                @csrf
                @method('PUT')

                <div class="form-group">





                    <textarea class="form-control"  name="body" >{{$news->body}}</textarea>



                    <div>
                        @error('body')
                        <span style="color: red"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>


                    <br>
                    <button type="submit" class="btn btn-primary btn-block">create</button>


                </div>
            </form>









        </div>
    </div>
















@endsection
