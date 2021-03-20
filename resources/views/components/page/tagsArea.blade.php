<div class="tags-area">


    @foreach (explode(" ",$image->tags) as $tag)
        <button onclick="window.location.href='/{{$tag}}'" class="tag">{{ucfirst($tag)}}</button>
    @endforeach

</div>
