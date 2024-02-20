$(function () {

    $("#insert_usuario").on("click", function (e) {
        if (e.target.id === 'insert_usuario') {
            const nombre = $("#nombre").val();
            const identificacion = $("#identificacion").val();
            const usuario = $("#usuario").val();
            const password = $("#password").val();
            const email = $("#email").val();
            const rol = $("#rol").val();
            $.post(
                '../controller/ctrlCreateUsuarios.php', {
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

    $(document).on("click", function (e) {
        if (e.target.id === "btn_info_usuario") {
            id = e.target.value;
            $.post(
                '../controller/ctrlModalInfoUsuarios.php',{
                    id: id
                }, function (response) {
                    $("#respuesta").html(response);
                }
            );
        } else if(e.target.id === "btn_edit_usuario"){
            id = e.target.value;
            $.post(
                '../controller/ctrlModalUpdateUsuarios.php',{
                    id: id
                }, function (response) {
                    $("#respuesta").html(response);
                }
            );
        }
    })


});