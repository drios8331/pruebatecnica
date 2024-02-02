$(function () {

    $("#insert_transaccion").on("click", function () {
        if (e.target.id === 'insert_transaccion') {
            const tipo = $("#tipo").val();
            const ingreso = $("#ingreso").val();
            const gasto = $("#gasto").val();
            const fecha = $("#fecha").val();
            const departamento = $("#departamento").val();
            $.post(
                '../controller/ctrlInsertGasto.php', {
                tipo: tipo,
                ingreso: ingreso,
                gasto: gasto,
                fecha: fecha,
                departamento: departamento,
            }, function (response) {
                $("#respuesta").html(response);
            }
            );
        }
    });


});