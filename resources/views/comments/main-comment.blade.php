

@foreach($post->comments as $comment)


@if($comment->accept   ==  1)



<div class="media mb-4">
    <img class="d-flex mr-3 rounded-circle" src="/storage/images/{{$comment->user->avatar}}" alt="" width="50px">
    <div class="media-body">



        <h5 class="mt-0">{{$comment->user->name}}</h5>

        {{$comment->comment}}



    </div>
</div>

@endif




@endforeach




