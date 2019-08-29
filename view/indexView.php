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

<body>

<!-- Navigation -->
<?php
    include_once 'public/navbar.php';
?>

<!-- Header -->
<header class="bg-primary py-5 mb-5">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-12">
                <h1 class="display-4 text-white mt-5 mb-2">Los mejores productos en audio profesional!</h1>
                <p class="lead mb-5 text-white-50">Tenemos todo lo necesario para que disfrutes de la mejor experiencia en audio, con productos de alta
                calidad, de las mejores marcas y el mejor precio del mercado.</p>
            </div>
        </div>
    </div>
</header>

<!-- Page Content -->
<div class="container">


    <!-- /.row -->
    <div class="row">
    <?php
    foreach($vars['products'] as $pro){
    ?>
        <div class="col-md-4 mb-5">
            <div class="card h-100">
                <img class="card-img-top" src="<?php echo $pro[4]?>"  alt="">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $pro[1]?></h4>
                    <p class="card-text"><?php echo $pro[3]?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">CRC <?php echo $pro[2]?></a>
                </div>
            </div>
        </div>

    <?php
    }
    ?>
    <!-- /.row -->
    </div>
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
