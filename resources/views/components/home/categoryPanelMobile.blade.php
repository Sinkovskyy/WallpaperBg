<div class="category panel">
    <button type="button" class="category button">Category :&nbsp;<span class="category sort">All</span> <img class="sort arrow" src="assets\blue_arrow.png" alt=""></button>
    <div class="dropdown-content sort scrollmenu" id="e">
        
        @foreach($tags as $key => $data)
          <div class="lg_button_option"><a href="">{{$data->tag}}</a></div>
        @endforeach

    </div>
</div>
