<div class="wallpaper grid">

    @foreach($images as $key => $data)
    <div class="wallpaper"> <a href="/page"><img src="data:image/jpeg;base64,{{base64_encode($data->Image)}}" alt=""></a></div>
    @endforeach

  </div>
