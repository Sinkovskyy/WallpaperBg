<div class="category panel">
    <button type="button" class="category button">Category :&nbsp;<span class="category sort">All</span> <img class="sort arrow" src="assets\blue_arrow.png" alt=""></button>
    <div class="dropdown-content sort scrollmenu" id="e">
        <?php
            $all = 0;
            foreach($tags as $key => $data)
            {
                $all += $data->amount;
            }
        ?>
        <div class="lg_button_option"><a href="/all">All</a></div>
        @foreach($tags as $key => $data)
          <div class="lg_button_option"><a href="/{{lcfirst($data->tag)}}">{{$data->tag}}</a></div>
        @endforeach

    </div>
</div>
