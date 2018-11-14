$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.catalogDeleteButton').click(function (e) {
        e.preventDefault();
        let dataModalText = $(this).attr('data-modal-text');
        let href = $(this).attr('href');
        $('#modalTarget').text(dataModalText);
        $('#yesModalButton').attr('href', href);
        $('#removeDialog').modal({
            show: true
        });
    });
    $('#yesModalButton').click(function () {
        $('#removeDialog').modal('hide');
    });
});