<?php
    require '../Model/ModelUsuarios.php';
    require '../../tools/Modal.php';

    $modal = new Modal();
    $usuarios = new Usuarios();

    $id = $_POST['id'];
    
    $listarUsuario = $usuarios->listarUsuariosById($id);
    $estado = $listarUsuario[0]['estado'] === 1 ? 'Activo' : 'Inactivo';

$contenidoModal  = "<ul class='list-group'>";
$contenidoModal .= "  <li class='list-group-item'>Id: $id</li>";
$contenidoModal .= "  <li class='list-group-item'>Nombre: ". $listarUsuario[0]['nombre'] ."</li>";
$contenidoModal .= "  <li class='list-group-item'>Identificacion: ". $listarUsuario[0]['identificacion'] ."</li>";
$contenidoModal .= "  <li class='list-group-item'>Usuario: ". $listarUsuario[0]['usuario'] ."</li>";
$contenidoModal .= "  <li class='list-group-item'>Email: ". $listarUsuario[0]['email'] ."</li>";
$contenidoModal .= "  <li class='list-group-item'>Rol: ". $listarUsuario[0]['rol_id'] ."</li>";
$contenidoModal .= "  <li class='list-group-item'>Vigencia Password: ". $listarUsuario[0]['fcPassword'] ."</li>";
$contenidoModal .= "  <li class='list-group-item'>Estado: ". $estado ."</li>";
$contenidoModal .= "</ul>";

$modal->modalAlerta('Informacion de Usuario', 'text-primary', $contenidoModal);