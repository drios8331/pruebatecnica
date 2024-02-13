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

<body class="scrolly m-0">
    <div id="respuesta"></div>
    <div class="content" id="index">
        <div class="row h-100">
            <div class="col-xl-6 bg-primary m-0 p-0"></div>
            <div class="col-xl-6 bg-secondary m-0 p-0">
                <div class="card w-50 mx-5 mt-5">
                    <div class="card-header card-title text-primary text-center">
                        <h3>Inicio de Session</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                    </div>
                    <div class="card-footer p-0 m-0">
                        <div class="d-greed">
                            <button class="btn btn-primary w-100 rounded-top-0">Iniciar Sesion</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            var height = $(window).height();

            $('#index').height(height);
        });
    </script>

</body>

</html>