var isMobileButtonActive = false;


function ifUserNotInHomePage(tag = "")
{
    if($(location).attr('pathname').substring(0,6) == "/page/")
    {
        window.location =  $(location).attr('protocol') + "//" + $(location).attr('hostname') + "/" + tag;
    }
}

// if clicked on active pc button and mobile
function search(input)
{
    ifUserNotInHomePage(input.val());
    linkChanged(input.val());
    input.val("");
}

function cancel()
{
    wrap = $(".header>.wrapper"),
    awrap = $(".header>.wrapper.active"),
    wndw = $(window),
    width = 800;
    if(wndw.width() <= width + 37)
    {
        wrap.css({"display":"grid"});
        awrap.css({"display":"none"});
        isMobileButtonActive = false;
    }
}


$(document).ready(function() {
    var wrap = $(".header>.wrapper"),
    awrap = $(".header>.wrapper.active"),
    wndw = $(window),
    width = 800;

    // enter listener for pc input
  $('#searchInput').keyup(function (e) {
    if(e.keyCode == 13)
    {
        search($(this));
    }

  });

  // enter listener for mobile input
  $('#searchInputMobile').keyup(function (e) {
    if(e.keyCode == 13)
    {
        search($(this));
        cancel();
    }

  });

  $(".search.button").click(function(){

    // search mobile animation button listener


    ifUserNotInHomePage();

    if(wndw.width() <= width + 37)
    {
        wrap.css({"display":"none"});
        awrap.css({"display":"flex"});
        if(!isMobileButtonActive)
        {
            isMobileButtonActive = true;
        }
        else
        {
            search($(".search.input.mobile"));
        }
    }
    else
    {
        search($(".search.input"));
    }

  });
  // cancel button listener
  $(".cancel.button").click(function(){
    cancel();
  });

  // resize window listener
  wndw.resize(function(){

    //change markup for 500+px screen width when search button is active
    if(wndw.width() > width + 37)
    {
      wrap.css({"display":"grid"});
      awrap.css({"display":"none"});
    }
  });

});
