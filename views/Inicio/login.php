<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExFinal - Bienvenido</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-lg-4 col-md-4 col-sm-12 card">
                <div class="card-body">
                    <h2 class="text-center pt-3 lead font-weight-bold display-4 my-5">Bienvenido</h2>
                    <form action="<?=constant('URL')?>inicio/index" method="POST">
                        <span class="badge bg-dark">Usuario</span>
                        <input type="text" class="form-control mb-3" name="txtUsuario">
                        <span class="badge bg-dark">Contraseña</span>
                        <input type="password" class="form-control mb-3" name="txtContrasena">
                        <button class="btn btn-dark mt-2 btn-block btn-sm my-5">Iniciar Sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    var url = "<?=constant('URL')?>";
    </script>
    <script src="<?=constant('URL')?>/public/js/jquery-3.6.0.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"></script>

    <script src="<?=constant('URL')?>/public/js/Libros.js"></script>
</body>

</html>