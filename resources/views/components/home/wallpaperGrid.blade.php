<div class="wallpaper grid">

    @foreach($images as $key => $image)
    <div class="wallpaper"> <a href="/page/{{$image->id}}">
        <img src="data:image/jpeg;base64,{{base64_encode($image->image)}}" alt="">
    </a></div>
    @endforeach

  </div>
