<div class="bottom side">
    <div class="gui-heading">Similar wallpapers</div>
    <div class="recommended images container wallpaper grid">

        @foreach ($rec as $img)
        <div class="wallpaper"><a href="/page/{{$img->id}}">
            <img src="data:image/jpeg;base64,{{base64_encode($img->image)}}" alt="">
        </a></div>
        @endforeach


    </div>
  </div>
