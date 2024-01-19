<?php
$titulo = $_POST['titulo'];
?>

 <nav class='navbar navbar-light bg-secondary'>
     <div class='container-fluid'>
         <button class='btn btn-primary' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasExample' aria-controls='offcanvasExample'>
             Menu Lateral
         </button>
         <h2 class="text-light fs-1"><b><?php echo $titulo?></b></h2>
         <button class='btn btn-primary' type='button' id="cerrarSesion">
             Cerrar Sesion
         </button>
     </div>
 </nav>