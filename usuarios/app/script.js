$(function () {

    $("#insert_usuario").on("click", function () {
        if (e.target.id === 'insert_usuario') {
            const nombre = $("#nombre").val();
            const identificacion = $("#identificacion").val();
            const usuario = $("#usuario").val();
            const password = $("#password").val();
            const email = $("#email").val();
            const rol = $("#rol").val();
            $.post(
                '../controller/ctrlInsertUsuarios.php', {
                nombre: nombre,
                identificacion: identificacion,
                usuario: usuario,
                password: password,
                email: email,
                rol: rol,
            }, function (response) {
                $("#respuesta").html(response);
            }
            );
        }
    });


});