$(document).ready(function() {
    $(".citation-style-list-item").click(function(e) {

        if(e.target !== e.currentTarget && e.target.classList.contains("citation-style-dropdown")) {
            return;
        }

        var id = $(this).attr("data-id");
        $.get('/resourcetypes/' + id, function (data) {
            $("#resource-types-list").empty();
            for(var i = 0; i < data.length; i++) {
                $("#resource-types-list").append("<a class='resource-types-list-item list-group-item' data-id='" + data[i]["id"] + "'>" + data[i]["name"] + "</a>");
            }
        })
    });
});
