$(function () {

    $('#btn_insert_departamento').on('click', function (e) {
        if (e.target.id === 'btn_insert_departamento') {
            $.post(
                "../controller/ctrlModalInsertDepartamento.php", {},
                function (response) {
                    $('#respuesta').html(response);
                }
            );
        }
    });

    $(document).on('click', function (e) {
        if (e.target.id === 'btn_insert_departamento_ok') {
            departamento = $('#departamento').val();
            $.post(
                '../controller/ctrlInsertDepartamentos.php', {
                departamento: departamento,
            }, function (response) {
                $('#respuesta').html(response);
            }
            )
        } else if (e.target.id === "btn_info_departamento") {
            id = $('#btn_info_departamento').val();
            $.post(
                '../controller/ctrlModalInfoDepartamento.php', {
                id: id,
            }, function (response) {
                $("#respuesta").html(response);
            }
            )
        } else if (e.target.id === "btn_edit_departamento") {
            id = e.target.value;
            $.post(
                '../controller/ctrlModalUpdateDepartamentos.php', {
                id: id,
            }, function (response) {
                $("#respuesta").html(response);
            }
            )
        }else if (e.target.id === "btn_update_departamento") {
            id = $("#idDepartamento").val();
            departamento = $("#departamento").val();
            estado = $("#estadoDepartamento").val();
            $.post(
                '../controller/ctrlUpdateDepartamento.php', {
                id: id,
                departamento: departamento,
                estado: estado
            }, function (response) {
                $("#respuesta").html(response);
            }
            )
        }
    })

    $('#btn_insert_genero').on('click', function (e) {
        if (e.target.id === 'btn_insert_genero') {
            $.post(
                "../controller/ctrlModalInsertGenero.php", {},
                function (response) {
                    $('#respuesta').html(response);
                }
            );
        }
    });

    $(document).on('click', function (e) {
        if (e.target.id === 'btn_insert_genero_ok') {
            genero = $('#genero').val();
            $.post(
                '../controller/ctrlInsertGeneros.php', {
                genero: genero,
            }, function (response) {
                $('#respuesta').html(response);
            }
            )
        } else if (e.target.id === "btn_info_genero") {
            id = $('#btn_info_genero').val();
            $.post(
                '../controller/ctrlModalInfoGenero.php', {
                id: id,
            }, function (response) {
                $("#respuesta").html(response);
            }
            )
        } else if (e.target.id === "btn_edit_genero") {
            id = e.target.value;
            $.post(
                '../controller/ctrlModalUpdateGenero.php', {
                id: id,
            }, function (response) {
                $("#respuesta").html(response);
            }
            )
        }else if (e.target.id === "btn_update_genero") {
            id = $("#idGenero").val();
            genero = $("#genero").val();
            estado = $("#estadoGenero").val();
            $.post(
                '../controller/ctrlUpdateGenero.php', {
                id: id,
                genero: genero,
                estado: estado
            }, function (response) {
                $("#respuesta").html(response);
            }
            )
        }
    })

});