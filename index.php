<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/logo.png" />
    <title>Index</title>

    <!-- JQuery -->
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.min.css">

    <!-- DataTables -->
    <script type="text/javascript" src="./node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./node_modules/datatables.net-dt/css/jquery.dataTables.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="./node_modules/animate.css/animate.min.css" />

    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="scrolly h-100">
    <div id="respuesta"></div>
    <div class="content" id="index" style="background-image: url('./assets/images/fondo.jpg'); background-size: 100% 100%; background-repeat: no-repeat;">
        <div class="row m-0 p-0">
            <div class="col-xl-6 m-0 p-0 d-flex align-items-center" style="height: 100vh;">
                <div class="card" style="margin-left: 20%; width: 35%;">
                    <div class="card-header text-primary text-center">
                        <h3>Inicio de Session</h3>
                    </div>
                    <div class="text-center">
                        <img src="./assets/images/logo.png" class="card-img-top" alt="Logo" style="width: 40%;">
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="usuario" placeholder="Usuario">
                            <label for="usuario">Usuario</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="card-footer p-0 m-0">
                        <div class="d-greed">
                            <button class="btn btn-primary w-100 rounded-top-0" id="iniciar_sesion" onclick="window.location='./home/view/home.php'">Iniciar Sesion</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>