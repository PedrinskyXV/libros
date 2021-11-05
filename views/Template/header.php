<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExFinal</title>
    <script type="text/javascript">
    var tituloOriginal = '';

    function agregarAlTitulo(textoAgregar) {
        if (tituloOriginal === '') {
            tituloOriginal = document.title;
        }
        document.title = tituloOriginal + ' - ' + textoAgregar;
    }

    function restablecerTitulo() {
        if (tituloOriginal !== '') {
            document.title = tituloOriginal;
        }
    }
    </script>
    <script src="<?=constant('URL')?>/public/js/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/themes@5.0.6/borderless/borderless.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=constant('URL')?>public/chartphp/js/chartphp.css">
    <script src="<?=constant('URL')?>public/chartphp/js/chartphp.js"></script>
    <link rel="stylesheet" href="<?=constant('URL')?>public/validetta/validetta.min.css" />
</head>

<body class="d-flex h-100 text-center text-dark bg-light">
<div class="cover-container d-flex w-100 h-100 mx-auto flex-column">

