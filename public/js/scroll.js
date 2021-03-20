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



function ifScrolledInTheEnd(offset,page)
{

    // When user scroll to the end of the document
    if( $(document).innerHeight() -  $(window).innerHeight() <= $(document).scrollTop() + offset)
    {
        tag = window.location.pathname;// Get current tag for images
        // Send post request for receiving images
        $.ajax({
            type: "POST",
            url: "/getImages",
            data:
            {
                "page":page,
                "tag":tag,
            },
            dataType: "json",
            success: function (response)
            {
                fillGridByImages(response["images"]);
            }
        });
        return (page + 1);
    }
    return page;
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

    var offset = 10,
    page = 0;// Current page
    page = ifScrolledInTheEnd(offset,page);

    // Scroll listener
    $(document).scroll(function(event){

        // UpButton listeners
        ifScrolledInUpButtonExtremeEdge();
        upButtonListener();

        // Document extreme edge
        page = ifScrolledInTheEnd(offset,page);
    });


});
