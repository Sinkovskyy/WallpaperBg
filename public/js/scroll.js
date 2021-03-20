// Set headers
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function ifScrolledInTheEnd(offset,page,tag)
{
    // When user scroll to the end of the document
    if( $(document).innerHeight() -  $(window).innerHeight() <= $(document).scrollTop() + offset)
    {
        // Disable scroll listener
        $(document).off("scroll");
        page++;
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
                console.log(response);
            }
        });
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

    var offset = 10,
    page = 1,// Current page
    tag = window.location.pathname;// Get current tag for images

    ifScrolledInTheEnd(offset,page,tag);

    // Scroll listener
    $(document).scroll(function(event){

        // UpButton listeners
        ifScrolledInUpButtonExtremeEdge();
        upButtonListener();

        // Document extreme edge
        ifScrolledInTheEnd(offset,page,tag);
    });


});
