$(function () {
    
    $('#insert_empleado').on('click', function (e) {
        if (e.target.id === "insert_empleado") {
            const documento = $("#documento").val();
            const nombre = $("#nombre").val();
            const apellido = $("#apellido").val();
            const edad = $("#edad").val();
            const fecha_ingreso = $("#fecha_ingreso").val();
            const salario = $("#salario").val();
            const genero = $("#genero").val();
            const departamento = $("#departamento").val();
            const comentarios = $("#comentarios").val();
            $.post(
                '../controller/ctrlInsertEmpleado.php', {
                documento: documento,
                nombre: nombre,
                apellido: apellido,
                edad: edad,
                fecha_ingreso: fecha_ingreso,
                salario: salario,
                genero: genero,
                departamento: departamento,
                comentarios: comentarios,
            }, function (response) {
                $('#respuesta').html(response);
            }
            );
        }
    });

    $(document).on('click', function (e) {
        if (e.target.id === 'btn_info_empleado') {
            const id = e.target.value;
            $.post(
                '../controller/ctrlModalInfoEmpleado.php',{
                    id:id,
                },function (response) {
                    $("#respuesta").html(response);
                }
            )
        } else if (e.target.id === 'btn_edit_empleado'){
            const id = e.target.value; 
            $.post(
                '../controller/ctrlModalUpdateEmpleado.php',{
                    id:id,
                },function (response) {
                    $("#respuesta").html(response);
                }
            )
        } else if (e.target.id === "btn_update_empleado") {
            const id = $("#idEmpleado").val();
            const documento = $("#documento").val();
            const nombre = $("#nombre").val();
            const apellido = $("#apellido").val();
            const edad = $("#edad").val();
            const fecha_ingreso = $("#fecha_ingreso").val();
            const salario = $("#salario").val();
            const genero = $("#genero").val();
            const departamento = $("#departamento").val();
            const comentarios = $("#comentarios").val();
            const estado = $("#estadoDepartamento").val();
            $.post(
                '../controller/ctrlUpdateEmpleado.php', {
                id: id,
                documento: documento,
                nombre: nombre,
                apellido: apellido,
                edad: edad,
                fecha_ingreso: fecha_ingreso,
                salario: salario,
                genero: genero,
                departamento: departamento,
                comentarios: comentarios,
                estado: estado,
            }, function (response) {
                $('#respuesta').html(response);
            }
            );
        }
    })
});