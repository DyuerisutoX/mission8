$(document).ready(function ()
{
    $("#formConnex").hide();

    $("#btnConnex").click(function ()
    {
        $("#formConnex").show();
    });

    $("#monModal").on('click', modal({
    escapeClose: false,
    clickClose: false,
    showClose: false
    }));
    
})