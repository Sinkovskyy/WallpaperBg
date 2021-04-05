

function img_scale_hover($img,hover,unhover = "100%")
{

  // Change image size when window's size changed
  $img.css({
    "height":"auto",
    "width":unhover
  });

  // Hover and unhover
  $img.mouseover(function(){
    $(this).css({
      "width":hover,
      "height":"auto"
    });
  }).mouseleave(function(){
    $(this).css({
      "width":unhover,
      "height":"auto"
    });
  });

}

function img_mobile_scale_hover($img,hover,unhover = "101%")
{
  // Change size when window change size
  $img.css({
    "width":"auto",
    "height":unhover
  });

// Hover and unhover
  $img.mouseover(function(){
    $(this).css({
      "height":hover,
      "width":"auto"
    });
  }).mouseleave(function(){
    $(this).css({
      "height":unhover,
      "width":"auto"
    });
  });
}

// Change containers size relatively on img. Bad practive
function changecontainersSizeByImage($containers,$img)
{
  var size = $containers.children().children().css("height");
  if(size == "0px")
  {
    setTimeout(update_grid,10);
    return
  }
    // Animation off
  $img.css({"transition":"width 0s"});
    // Disable hover on image
  $img.off("mouseover");
    // Make images normal again
  $img.css({"width":"100%"});

  size = $containers.children().children().css("height");
  $containers.each(function(){
    $(this).css({"height": size});
  });
    // Animation on
  $img.css({"transition":"width 0.45s"});
}

//For pc version
function change_to_nine_grid($grid,$containers)
{
  // Declare image variable
  var $img = $containers.children().children();

  // Change grid template
  $grid.css({"grid-template-columns":"" + "1fr" + " 1fr" + " 1fr"});

    //Scale image size when hover on them//Scale image size when hover on them

  changecontainersSizeByImage($containers,$img);
  img_scale_hover($img,"115%");

  // Change image to absolute after containers get scalling relatively on img
  $img.css({"transform":"translate(-50%,-50%)"});
  $img.css({"position":"absolute"});
}


function change_to_four_grid($grid,$containers)
{
  // Declare image variable
  var $img = $containers.children().children();

  // Change grid template
  $grid.css({"grid-template-columns":"50% 50%"});

 //Scale image size when hover on them
  changecontainersSizeByImage($containers,$img);

  img_scale_hover($img,"105%");

  // Change image to absolute after containers get scalling relatively on img
  $containers.children().children().css({"transform":"translate(-50%,-50%)"});
  $containers.children().children().css({"position":"absolute"});

}




function change_to_two_grid($grid,$containers)
{
  // Declare image variable
  var $img = $containers.children().children();

  // Change grid template
  $grid.css({"grid-template-columns":"100%"});



  //Scale image size when hover on them
  changecontainersSizeByImage($containers,$img);

  img_scale_hover($img,"100%");


  // Change image to absolute after containers get scalling relatively on img
  $containers.children().children().css({"transform":"translate(-50%,-50%)"});
  $containers.children().children().css({"position":"absolute"});

}


//For mobile version
function change_to_nine_grid_mobile($grid,$containers,height)
{
    var $img = $containers.children().children();

    $grid.css({"grid-template-columns":"" + 100/3 + "%" + 100/3 + "%" + 100/3 + "%"});
    $containers.css({"height":height/3+"px"});
    $img.css({"transition":"height 0.45s"});

    //Scale image size when hover on them
    img_mobile_scale_hover($img,"115%");

    // Change image to absolute after containers get scalling relatively on img
    $containers.children().children().css({"transform":"translate(-50%,-50%)"});
    $containers.children().children().css({"position":"absolute"});

}


function change_to_four_grid_mobile($grid,$containers,height)
{
  var $img = $containers.children().children();
  $grid.css({"grid-template-columns":"50% 50%"});
  $containers.css({"height":height/2+"px"});
  $img.css({"transition":"height 0.45s"});

  // Change image to absolute after containers get scalling relatively on img
  $containers.children().children().css({"transform":"translate(-50%,-50%)"});
  $containers.children().children().css({"position":"absolute"});

  //Scale image size when hover on them
  img_mobile_scale_hover($img,"105%");
}


function change_to_two_grid_mobile($grid,$containers,height)
{

  var hheader = $(".header").css("height"),
      $img = $containers.children().children();
  hheader = parseInt(hheader, 10);
  $grid.css({"grid-template-columns":"100%"});
  $containers.css({"height":height - hheader+"px"});

  // Change image to absolute after containers get scalling relatively on img
  $containers.children().children().css({"transform":"translate(-50%,-50%)"});
  $containers.children().children().css({"position":"absolute"});

  //Scale image size when hover on them
  img_mobile_scale_hover($img,"101%");
}

//Chenge grid size
function change_grid_state(tpgrid,grid,containers)
{
  if(tpgrid == "nine")
  {
    change_to_nine_grid(grid,containers);
  }
  else if(tpgrid == "four")
  {
    change_to_four_grid(grid,containers);
  }
  else
  {
    change_to_two_grid(grid,containers);
  }
}

//Chenge grid size for mobile version
function change_mobile_grid_state(tpgrid,grid,containers,height)
{
  // Change grid state
  if(tpgrid == "nine")
  {
    change_to_nine_grid_mobile(grid,containers,height);
  }
  else if(tpgrid == "four")
  {
    change_to_four_grid_mobile(grid,containers,height);
  }
  else
  {
    change_to_two_grid_mobile(grid,containers,height);
  }
}

function update_grid()
{
    grid = $(".wallpaper.grid");
    containers = grid.children();
    width = $(window).width();
    height = $(window).height();

    // For page.html
    if(!$(".grid.panel")[0])
    {
      if(width <= 800)
      {
        tpgrid = "two";
        change_mobile_grid_state(tpgrid,grid,containers,height);
      }
      else
      {
        tpgrid = "nine"
        change_grid_state(tpgrid,grid,containers);
      }

    }

    // For main.html
    if(width > 800){
      $(".grid.panel").children().each(function(){
          if($(this).attr("src").search("red") + 1)
          {
            tpgrid = $(this).attr("id");
            change_grid_state(tpgrid,grid,containers);
          }
      });
    }
    else {
      $(".grid.panel").children().each(function(){
          if($(this).attr("src").search("red") + 1)
          {
            tpgrid = $(this).attr("id");
            change_mobile_grid_state(tpgrid,grid,containers,height);
          }
      });
  }
  grid.css({"opacity":"1"});
}



$(document).ready(function(){


  var grid, tpgrid;


  grid = $(".wallpaper.grid");
  containers = grid.children();
  width = $(window).width();
  height = $(window).height();

  if(localStorage.getItem("tpgrid") === null)
  {
    tpgrid = "nine";
  }
  else
  {
    tpgrid = localStorage.tpgrid;
  }


  // Auto-set red icon for last grid icon
  $("#" + tpgrid).attr("src","public/assets/red_" + tpgrid + "_grid.png");

  //Update grid
  update_grid();
  setTimeout(update_grid,50);

  // Resize trigger
  $(window).resize(function(){
    width = $(window).width();
    height = $(window).height();
    update_grid();
    setTimeout(update_grid,50);
  });




  // On icon grid click
  $(".grid.panel").children().click(function(event){

    // Reset all grid assets color to blue
    $(".grid.panel").children().each(function(){
        $(this).attr("src","public/assets/blue_" + $(this).attr("id") + "_grid.png");
    });

    width = $(window).width();
    height = $(window).height();
    tpgrid = $(this).attr("id");

    //Session for grid type
    localStorage.setItem("tpgrid",tpgrid);

    // Change button to active form
    $(this).attr("src","public/assets/red_" + tpgrid + "_grid.png");

    update_grid();
    setTimeout(update_grid,5);

  });

});
