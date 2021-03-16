<div class="left side">

    <div class="category menu">
      <div class="themes scrollmenu">

        @foreach($tags as $key => $data)
        <a href="">{{$data->TagName}}<span>{{$data->amount}}</span></a>
          <br>
        @endforeach

      </div>
    </div>

    <div class="upbutton container"><img src="assets\up-arrow-button.png" alt=""></div>

</div>