

<div class="col-lg-12">


    <ul class="list-unstyled mb-0">


        @foreach($categorys as $category)

        <li>
            <a href="#">{{$category->name}}</a>
        </li>


        @endforeach


    </ul>
</div>


