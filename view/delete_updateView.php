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

    <script type="text/javascript" src="public/js/script.js"></script>
</head>

<body>

<?php
include_once 'public/navbar.php';

?>
    <CENTER>
    <h2 style="margin-bottom: 30px; margin-top: 30px">Gestionar artículos</h2>

    <div class="contenedor">
        <div id="principal" class="container-fluid">
            <div class="row">
                <div id="contenido" class="container-fluid text-center table-responsive col-sm-12"
                     style="border:1px solid green;">
                    <table id="data_table" class="table table-striped container-fluid" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($vars['products'] as $articulos) { ?>
                            <tr id="fila<?php echo $articulos[0]?>">
                                <form method="post" action="?controlador=Producto&accion=actualizarArticuloCant">
                                    <td><img src="<?php echo $articulos[4] ?>" width="50" height="50"></td>

                                    <td><input id="<?php echo $articulos[0] ?>" name="<?php echo $articulos[1] ?>"
                                               type="text"
                                               class="form-control"
                                               style="width: 100%; cursor: auto;" value="<?php echo $articulos[1] ?> "
                                        ></td>
                                    <td><input id="<?php echo $articulos[0].$articulos[0] ?>" name="<?php echo $articulos[2] ?>"
                                               type="text"
                                               class="form-control"
                                               style="width: 100% cursor: auto;" value="<?php echo $articulos[2] ?>"
                                        ></td>
                                    <td><input id="<?php echo $articulos[0].$articulos[0].$articulos[0] ?>"
                                               name="<?php echo $articulos[0].$articulos[0] ?>" type="text"
                                               class="form-control"
                                               style="width: 100%; cursor: auto;" value="<?php echo $articulos[3] ?>"
                                        ></td>
                                    <td><input type="button" class="btn btn-warning" value="Actualizar articulo"
                                               onclick="updateProduct(<?php echo $articulos[0] ?>, $('#<?php echo $articulos[0] ?>').val(),
                                                       $('#<?php echo $articulos[0].$articulos[0] ?>').val(),$('#<?php echo $articulos[0].$articulos[0].$articulos[0] ?>').val());return false;">

                                    <td><input type="button" class="btn btn-danger" value="Eliminar articulo"
                                               onclick="deleteProduct(<?php echo $articulos[0] ?>);return false;">

                                </form>
                            </tr>
                        <?php }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </CENTER>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>