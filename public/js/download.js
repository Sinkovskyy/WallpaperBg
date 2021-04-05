// Set headers
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
});


function sendDataToServer()
{
    $.ajax({
        type: "POST",
        url: "/userDownloadedImage",
        data:
        {
            "id": window.location.pathname.substring(6),
        },
        dataType: "json",
        success: function (response)
        {
        }
    });
}




$(document).ready(function()
{
    var button,image;
    button = $(".download-button");
    image = $(".main.wallpaper").attr("src"),
    fileName = "image.png";

    //Download image
    button.click(function(e) {
        e.preventDefault();
        sendDataToServer();
        var downloadLink = document.createElement("a");
        downloadLink.href = image;
        downloadLink.download = fileName;
        downloadLink.click();
    });

});
