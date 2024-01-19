$(function () {
    titulo = $(document).attr('title');
    const navbar = document.querySelector('#navbar');
    $.post(
        '../../tools/navBar.php', {
        titulo: titulo
    }, function (response) {
        $('#navbar').html(response);
    }
    )

})