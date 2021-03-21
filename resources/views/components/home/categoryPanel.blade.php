<div class="left side">

    <div class="category menu">
      <div class="themes scrollmenu">
        <?php
            $all = 0;
            foreach($tags as $key => $data)
            {
                $all += $data->amount;
            }
        ?>
        <a href="/all">All<span>{{$all}}</span></a>
        <br>
        @foreach($tags as $key => $data)
        <a href="/{{lcfirst($data->tag)}}">{{ucfirst($data->tag)}}<span>{{$data->amount}}</span></a>
          <br>
        @endforeach

      </div>
    </div>

    <div class="upbutton container"><img src="assets\up-arrow-button.png" alt=""></div>

</div>
