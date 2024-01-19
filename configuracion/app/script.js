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
                '../controller/ctrlInsertDepartamentos.php',{
                    departamento: departamento,
                },function (response) {
                    $('#respuesta').html(response);
                }
            )
        // } else if () {

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
                '../controller/ctrlInsertGeneros.php',{
                    genero: genero,
                },function (response) {
                    $('#respuesta').html(response);
                }
            )
        // } else if () {

        }
    })

});