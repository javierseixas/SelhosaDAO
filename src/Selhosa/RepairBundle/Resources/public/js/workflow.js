$(document).ready(function () {

    var changeStatus = function(workorder,newstatuskeyword,metadata) {
        $.ajax({
            type: "GET",
            url: "/aplicatiu/ajax/canviar-estat-ot",
            data: {
                'workorderid': workorder,
                'newstatuskeyword': newstatuskeyword,
                'metadata': metadata
            },
            success: function() {
                $('#workorder-'+workorder).hide();
            },
            context: document.body
        }).done(function() {
        });
    }

    $('.change-workorderstatus').each(function() {
        var workorderid,statuskeyword;
        $(this).click(function() {
            changeStatus($(this).data('workorderid'),$(this).data('newstatuskeyword'),$(this).data('metadata'));
        })
    });

});
