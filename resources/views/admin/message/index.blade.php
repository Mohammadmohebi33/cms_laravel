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





@endsection

