<?php
    require '../Model/ModelUsuarios.php';
    require '../../tools/Modal.php';

    $modal = new Modal();
    $usuario = new Usuarios();

    $id = $_POST['id'];
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $newPassword = $_POST['newPassword'];

    $Id = trim($id);
    $Identificacion = trim($identificacion);
    $Nombre = trim($nombre);
    $Usuario = trim($usuario);
    $Email = trim($email);
    $Rol = trim($rol);
    $NewPassword = trim($newPassword);

