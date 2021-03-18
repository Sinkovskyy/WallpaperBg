<div class="wallpaper grid">

    @foreach($images as $key => $image)
    <div class="wallpaper"> <a href="/page/{{$image->Id}}"><img src="data:image/jpeg;base64,{{base64_encode($image->Image)}}" alt=""></a></div>
    @endforeach

  </div>
