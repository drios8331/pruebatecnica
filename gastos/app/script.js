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

const tipo = document.querySelector('#tipo');
const ingreso = document.querySelector('#ingreso');
const ingresoLabel = document.querySelector('#ingresoLabel');
const gasto = document.querySelector('#gasto');
const gastoLabel = document.querySelector('#gastoLabel');

cargarEventListeners();
function cargarEventListeners() {
    document.addEventListener('DOMContentLoaded', () => {
        tipoEvento();
    });
    tipo.addEventListener('click', tipoEvento);
}

function tipoEvento() {
    if (tipo.value === '1') {
        ingreso.hidden=false;
        ingresoLabel.hidden=false;
        gasto.hidden=true;
        gastoLabel.hidden=true;
    } else {
        ingreso.hidden=true;
        ingresoLabel.hidden=true;
        gasto.hidden=false;
        gastoLabel.hidden=false;
    }
}

