
// global variables
var access = true,
page = 0;




// Set headers
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function fillGridByImages(images)
{
    var img;
    images.forEach(image => {
        img = "<div class='wallpaper'><a href='/page/"+ image['id'] +"'><img src='data:image/jpeg;base64,"
        + image['image'] + "' alt=''></a></div>";
        $(".wallpaper.grid").append(img);
    });
    update_grid();
}
// Send post request for receiving images
function imageRequest()
{
    $.ajax({
        type: "POST",
        url: "/getImages",
        data:
        {
            "page":page,
            "tag":window.location.pathname,
        },
        dataType: "json",
        success: function (response)
        {
            fillGridByImages(response["images"]);
            page++;
            access = true;
        }
    });
    return
}

function ifScrolledInTheEnd(offset)
{
    // When user scroll to the end of the document
    if( $(document).innerHeight() -  $(window).innerHeight() <= $(document).scrollTop() + offset)
    {
        if (access)
        {
            access = false;
            imageRequest();
        }
    }
}


function ifScrolledInUpButtonExtremeEdge()
{
    // Scroll position checker
    var scrollpos = $(document).scrollTop();
    if(scrollpos > 900)
    {
        $(".upbutton").children().css({"visibility":"visible"});
    }
    else
    {
        $(".upbutton").children().css({"visibility":"hidden"});
    }
}

function upButtonListener()
{
    // Click listener on upButton
    $(".upbutton").children().click(function(){
        $(document).scrollTop(0);
    });
}


$(document).ready(function(){

    var offset = 500,
    page = 0;// Current page
    page = ifScrolledInTheEnd(offset,page);

    // Scroll listener
    $(document).scroll(function(event){
        // UpButton listeners
        ifScrolledInUpButtonExtremeEdge();
        upButtonListener();

        // Document extreme edge
        ifScrolledInTheEnd(offset,page);
    });


});
