<div class="tags-area">


    @foreach (explode(" ",$image->Tags) as $tag)
    <button class="tag">{{ucfirst($tag)}}</button>
    @endforeach

</div>
