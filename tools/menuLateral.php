<?php
$title = $_POST['title'];

$configuracion = '';
$empleados = '';
$gastos = '';
$home = '';
$stateHome = '';
$stateEmpleados = '';
$stateConfiguracion = '';
$stateGastos = '';

if ($title === 'Home') {
    $home = 'active';
    $stateHome = 'true';
} else if ($title === 'Empleados') {
    $empleados = 'active';
    $stateEmpleados = 'true';
} else if ($title === 'Configuracion') {
    $configuracion = 'active';
    $stateConfiguracion = 'true';
} else if ($title === 'Gastos') {
    $gastos = 'active';
    $stateGastos = 'true';
}

echo "  <div class='list-group rounded-0 list-hover'>";
echo "   <a href='../../home/view/home.php' class='list-group-item list-group-item-action list-group-item-primary $home' aria-current='$stateHome'> <i class='bi bi-house-door-fill'></i> Home</a>";
echo "   <a href='../../empleados/view/empleados.php' class='list-group-item list-group-item-action list-group-item-primary $empleados' aria-current='$stateEmpleados'> <i class='bi bi-people-fill'></i> Empleados</a>";
echo "   <a href='../../configuracion/view/configuracion.php' class='list-group-item list-group-item-action list-group-item-primary $configuracion' aria-current='$stateConfiguracion'> <i class='bi bi-gear-fill'></i> Configuracion</a>";
echo "   <a href='../../gastos/view/gastos.php' class='list-group-item list-group-item-action list-group-item-primary $gastos' aria-current='$stateGastos'> <i class='bi bi-cash-coin'></i> Gastos</a>";
echo '  </div>';
