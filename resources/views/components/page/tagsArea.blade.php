<div class="tags-area">


    @foreach (explode(" ",$image->Tags) as $tag)
    <button class="tag">{{$tag}}</button>
    @endforeach

</div>
