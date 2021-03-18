
// Set headers
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


function check(offset,page,tag)
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


$(document).ready(function () {


    var offset = 10,

    page = 1,// Current page
    tag = window.location.pathname;// Get current tag for images
    check(offset,page,tag);
    // Check if user scrolled in the end of page
    $(document).scroll(function(){
        check(offset,page,tag);
    });
});
