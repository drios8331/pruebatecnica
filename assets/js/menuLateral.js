$(function () {
    title = $(document).attr("title");
    const spinner = document.querySelector("#spinner");
    spinner.style.display = "flex";
    $.post(
        "../../tools/menuLateral.php", {
        title: title,
    }, function (response) {
        $('#menuLateral').html(response);
    }
    );
});