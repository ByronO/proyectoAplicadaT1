
<!-- Navigation -->
<?php
include_once 'public/header.php';
include_once 'public/navbar.php';
?>


<body>
<CENTER>
<div style="width: 50%;">

    <h2 style="margin-top: 30px; margin-bottom: 30px">Registrar producto</h2>
    <form method="post" action="?controlador=Product&accion=registerProduct" enctype="multipart/form-data">
        <div id="u" class="form-group">
            <input type="text" class="form-control" style="margin-bottom: 20px" name="name" id="name"
                   placeholder="Nombre del producto">
            <input type="number" class="form-control" style="margin-bottom: 20px" name="price" id="price"
                   placeholder="Precio del producto">
            <input type="text" class="form-control" style="margin-bottom: 20px" name="description" id="description"
                   placeholder="Descripción del producto">


            <button type="submit" class="btn btn-success">Registrar</button>
        </div>

    </form>

</div>
</CENTER>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>


