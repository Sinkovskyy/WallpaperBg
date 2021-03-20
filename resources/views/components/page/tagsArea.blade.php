<div class="tags-area">


    @foreach (explode(" ",$image->tags) as $tag)
        <button class="tag">{{ucfirst($tag)}}</button>
    @endforeach

</div>
