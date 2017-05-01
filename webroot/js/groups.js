$( document ).ready(function(event) {
    console.log( "ready!" );
    $("[id^=img-group-]").click(function(event) {
        var groupId = event.target.id.split('-')[2];
        $.ajax({
            type:"POST",
            async: true,
            data: {$groupId: groupId},
            url: groupAjaxUrl + '/' + groupId,
            success : function(data) {
                console.log(data);
                var $contentDiv = $('#contents');
                $contentDiv.empty();
                $contentDiv.append(data);

            },
            error : function() {
                console.log("false");
            }
        });
    });

});
