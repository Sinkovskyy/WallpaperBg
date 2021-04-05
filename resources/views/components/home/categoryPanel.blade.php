<div class="left side">

    <div class="category menu">
      <div class="themes scrollmenu">
      
        @foreach($tags as $key => $data)
        @if($data->tag == "all")
        <a href="javascript:linkChanged('{{$data->tag}}');">{{ucfirst($data->tag)}}<span>{{$data->amount}}</span></a>
          <br>
        @endif
        @endforeach

        @foreach($tags as $key => $data)
        @if($data->tag != "all")
        <a href="javascript:linkChanged('{{$data->tag}}');">{{ucfirst($data->tag)}}<span>{{$data->amount}}</span></a>
          <br>
        @endif
        @endforeach

      </div>
    </div>

    <div class="upbutton container"><img src="{{asset('assets\up-arrow-button.png')}}" alt=""></div>

</div>
