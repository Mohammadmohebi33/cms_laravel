

<div class="card my-4">
    <h5 class="card-header">Leave a Comment:</h5>
    <div class="card-body">



        <form method="post" action="{{route('comment' , $post->id)}}">
            @csrf
            <div class="form-group">
                <textarea class="form-control" rows="3" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>




    </div>
</div>
