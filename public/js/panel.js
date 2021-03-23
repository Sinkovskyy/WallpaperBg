
function changeVisualSortType()
{
    $(".sort.button span.category.sort").text(localStorage.sortType);
}



$(document).ready(function() {


    // Check if sortType session exist
    if(localStorage.getItem("sortType") === null)
    {
        localStorage.setItem("sortType","Newest");
    }
    changeVisualSortType();


    // When user click on sort drop-down panel option
    $("#sort-drop-down .lg_button_option").click(function()
    {
        localStorage.setItem('sortType',$(this).children().text());
        changeVisualSortType();
        linkChanged(window.location.pathname.substr(1));
    });




    $(".panel").click(function(){
        var menu = $(this).children(".dropdown-content");
        var arrow =  $(this).children(".button").children(".sort.arrow");

        if(menu.css("opacity") == "1")
        {
        menu.css({
            "opacity":"0",
            "z-index":"-1"
        });
        arrow.css({"transform":"rotate(0deg)"});
        }
        else
        {
        menu.css({
            "opacity":"1",
            "z-index":"1"
        });
        arrow.css({"transform":"rotate(180deg)"});
        }
    });


});
