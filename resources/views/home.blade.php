@include('components.home.header')


    <div class="options panel">

          @include('components.home.optionPanel')
          @include('components.home.categoryPanelMobile')

          <div class="grid panel">
            <img id="two" src="assets\blue_two_grid.png" alt="">
            <img id="four" src="assets\blue_four_grid.png" alt="">
            <img id="nine" src="assets\blue_nine_grid.png" alt=""></div>
        </div>
      </div>



    <div class="main content">

        @include('components.home.categoryPanel')

        <div class="right side">

          @include('components.home.wallpaperGrid')

        </div>

      </div>

@include('components.footer')
