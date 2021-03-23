
// global variables
var access = true,
page = 0;




// Set headers
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});

// Change category name
function changeCategoryName()
{
    var tag = window.location.pathname.substr(1),
        categoryName = $("#categoryName");

    if (tag == "all" || tag == "")
    {
        categoryName.text("Wallpaper HD");
    }
    else
    {
        categoryName.text(tag.charAt(0).toUpperCase() + tag.substr(1) + " wallpaper HD");
    }

}

// Append new images in grid
function fillGridByImages(images)
{
    var img;
    images.forEach(image => {
        img = "<div class='wallpaper'><a href='/page/"+ image['id'] +"'><img src='data:image/jpeg;base64,"
        + image['compressed_image'] + "' alt=''></a></div>";
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
            "sort": localStorage.sortType,
        },
        dataType: "json",
        success: function (response)
        {
            console.log(response);
            fillGridByImages(response["images"]);
            changeCategoryName();
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


// Tag navigation listener
function linkChanged(tag)
{
    window.history.pushState({page: "another"}, "another page", tag);
    $(".grid.wallpaper").empty();
    page = 0;
    access = true;
    imageRequest();
    $("#categoryMobilePanel").text(tag.charAt(0).toUpperCase() + tag.substr(1));
}


$(document).ready(function(){

    var offset = 1200, // pixels remained for end of the document when ajax request must trigger
    page = 0;// Current page
    ifScrolledInTheEnd(offset);
    // Scroll listener
    $(document).scroll(function(event){
        // UpButton listeners
        ifScrolledInUpButtonExtremeEdge();
        upButtonListener();

        // Document extreme edge
        ifScrolledInTheEnd(offset);
    });


});
