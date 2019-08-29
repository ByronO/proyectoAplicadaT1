<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Audio World</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/business-frontpage.css" rel="stylesheet">

</head>

<header class="bg-primary py-5 mb-5">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 text-white mt-5 mb-2">Los mejores productos en audio profesional!</h1>
                <p class="lead mb-5 text-white-50">Tenemos todo lo necesario para que disfrutes de la mejor experiencia
                    en audio, con productos de alta
                    calidad, de las mejores marcas y el mejor precio del mercado.</p>
            </div>
        </div>
    </div>
</header>

<body>

<!-- Navigation -->
<?php
include_once 'public/navbar.php';
?>


<body>
<CENTER>
    <div style="width: 50%;">

        <h2 style="margin-top: 30px; margin-bottom: 30px">Su codigo es el siguiente</h2>

        <h2 style="margin-top: 30px; margin-bottom: 30px"><?php echo $vars['code'];?></h2>

        <br>
        <button type="button" class="btn btn-success"><a class="nav-link" style="color: white;" href="?controlador=Product&accion=home">Aceptar</a></button>

    </div>
</CENTER>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


