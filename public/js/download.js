
$(document).ready(function()
{
    var button,image;
    button = $(".download-button");
    image = $(".main.wallpaper").attr("src"),
    fileName = "image.png";

    //Download image
    button.click(function(e) {
        e.preventDefault();
        var downloadLink = document.createElement("a");
        downloadLink.href = image;
        downloadLink.download = fileName;
        downloadLink.click();
    });

});
