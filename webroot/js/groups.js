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
                //console.log(data);
                var $contentDiv = $('#contents');
                $contentDiv.empty();
                $contentDiv.append(data);

                $('#upload-form').off().on('submit', function(e){
                    console.log("ajax");
                    e.preventDefault();
                    var formdatas = new FormData($('#upload-form')[0]);
                    $.ajax({
                        url: fileAjaxUrl,

                        method: 'post',
                        data:  formdatas,
                        contentType: false,
                        processData: false
                    })
                        .done(function(response) {
                            console.log(response);
                        })
                        .fail(function(jqXHR) {
                            if (jqXHR.status == 403) {

                            } else {
                                console.log(jqXHR.responseText);

                            }
                        });

                });

            },
            error : function() {
                console.log("false");
            }
        });
    });

});
