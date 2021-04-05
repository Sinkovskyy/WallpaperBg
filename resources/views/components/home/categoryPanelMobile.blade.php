<div class="category panel">
    <button type="button" class="category button">Category :&nbsp;
        <span class="category sort" id="categoryMobilePanel">{{ucfirst(substr($_SERVER['REQUEST_URI'],1))}}</span>
        <img class="sort arrow" src="{{asset('assets\blue_arrow.png')}}" alt=""></button>
    <div class="dropdown-content sort scrollmenu" id="e">
     
        
        @foreach($tags as $key => $data)
        @if($data->tag == "all" )
          <div class="lg_button_option" onclick="javascript:linkChanged('{{$data->tag}}');">
          <a href="javascript:linkChanged('{{$data->tag}}');">{{ucfirst($data->tag)}}</a></div>
        @endif
        @endforeach

        @foreach($tags as $key => $data)
        @if($data->tag != "all" )
          <div class="lg_button_option" onclick="javascript:linkChanged('{{$data->tag}}');">
          <a href="javascript:linkChanged('{{$data->tag}}');">{{ucfirst($data->tag)}}</a></div>
        @endif
        @endforeach

    </div>
</div>
