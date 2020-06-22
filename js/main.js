/*$(".activator").click(function () {
    let activateId = $(this).attr("data-activate");
    $("#" + activateId).toggleClass("hide");
});*/

$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})