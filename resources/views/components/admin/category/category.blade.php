

<div class="col-lg-12">


    <ul class="list-unstyled mb-0">


        @foreach($categorys as $category)

        <li>
            <a href="{{route('home.category' , $category->id)}}">{{$category->name}}</a>
        </li>


        @endforeach


    </ul>
</div>


