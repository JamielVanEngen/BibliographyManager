$(document).ready(function() {

    $(".citation-style-list-item").click(function(e) {

        if(e.target !== e.currentTarget && e.target.classList.contains("citation-style-dropdown")) {
            return;
        }
        var id = $(this).attr("data-id");
        $.get('/resourcetypes/' + id, function (data) {
            $(".resource-types-list").empty();
            if (data.length !== 0) {
                for(var i = 0; i < data.length; i++) {
                    var resourceType = $("<a class='resource-types-list-item list-group-item' data-id='" + data[i]["id"] + "'>" + data[i]["name"] + "</a>").hide();

                    $(this).find(".resource-types-list").append(resourceType);
                    resourceType.fadeIn('normal');
                }
            }
            else {
                $(this).find(".resource-types-list").append("<p>No resource types found!</p>");
            }
        })
    });

    function appendNewCitationStyle(id, name) {
        var newCitationHtml = '<div href="#" class="list-group-item citation-style-list-item" data-id="' + id +'">' +
            '<span class="">' + name +'</span>' +
            '<span class="dropdown option-dropdown">' +
                '<span class="citation-style-dropdown dropdown-toggle glyphicon glyphicon-option-vertical" id="dropdownMenu' + id +'" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">' +
                '</span>' +
                '<ul class="dropdown-menu" aria-labelledby="dropdownMenu' + id +'">' +
                    '<li><a href="#">Edit</a></li>' +
                    '<li role="separator" class="divider"></li>' +
                    '<li><a href="#">Delete</a></li>' +
                '</ul>' +
            '</span>' +
        '</div>';
        var newCitationStyle = $(newCitationHtml).hide();

        $('#citation-style-list').append(newCitationStyle);
        newCitationStyle.fadeIn('normal');
    }

    $("#add-citation-style").click(function(e) {
        var name = $("#new-citation-style-name").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '/citationstyles/store',
            data: {'name': name},
            dataType: 'json',
            success: function (data) {
                $("#create-citation-style-modal").modal("hide");
                appendNewCitationStyle(data['id'], data['name']);
            },
            error: function (data) {
                if (data.status === 422) {
                    var response = JSON.parse(data.responseText);
                    alert(response['name'][0]);
                }
            }
        });
    });
});
