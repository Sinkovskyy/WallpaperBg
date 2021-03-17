<!doctype html>
<html lang="en">
  <head>
    <title>WallpaperBg</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/page_body.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{asset('css/adaptive.css')}}">
    <link rel="stylesheet" href="{{asset('css/page-adaptive.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/searchbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/grid.js')}}"></script>

  </head>
  <body>
    <div class="header">
      <div class="wrapper">
        <div class="logo">
          <a href="/">
          <img id="logo" src="{{asset('assets\WallpaperBg.png')}}" alt="">
          </a>
        </div>
        <div class="searchbar">
            <input class="search input" placeholder="Search"/>
            <button type="button" class="search button"name="button"><span class = "search button"></span></button>
        </div>
        <div class="lgbar">
          <div class="lgwrapper">
          <div class="flexVertical">
            <div id="lg">En</div>
            <div class="dropdown-content">
              <div class="lg_button_option"><a href="#"><img src="{{asset('assets\English.png')}}" alt=""></a></div>
              <div class="lg_button_option"><a href="#"><img src="{{asset('assets\Ukrainian.png')}}" alt=""></a></div>
            </div>
          </div>
            <img src="{{asset('assets\arrow.png')}}" id="arrow" alt="">
          </div>
        </div>
      </div>
      <div class="wrapper active">
        <div class="searchbar active">
          <button type="button" class="search button"name="button"><span class = "search button"></span></button>
          <input class="search input" placeholder="Search"/>
          <button type="button" class="cancel button"name="button"><span class ="cancel button"></span></button>
        </div>
      </div>


    </div>
