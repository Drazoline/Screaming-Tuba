$(document ).ready(function(event) {

        function callAjax(id){
            $.ajax({
                type:"POST",
                async: true,
                data: {$groupId: id},
                url: groupAjaxUrl + '/' + id,
                success : function(data) {
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
                                var $contentDiv = $('#table-files');
                                $contentDiv.append(response);
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
        }
    console.log( "ready!" );
    $("[id^=img-group-]").click(function(event) {
        var groupId = event.target.id.split('-')[2];
        Cookies.set('lastgroup', groupId);
        callAjax(groupId);
    });
    var groupid = Cookies.get('lastgroup');
    if(typeof groupid !== "undefined")
    {
        callAjax(groupid);
    } else if (defaultGroupId != '') {
        callAjax(defaultGroupId);
    } else {
        var $contentDiv = $('#contents');
        $contentDiv.empty();
        $contentDiv.append("<div class=\"no-group-message\">Aucun groupe</div>");

    }



});
