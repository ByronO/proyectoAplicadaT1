<nav class="navbar navbar-default navbar-fixed-top" style="z-index: 10000">

    <!-- contenedor con 12 columnas--->
    <div class="container" content="width=device-widt">
        <div class="navbar-header">
            <!--Modo de visualizacion vertical-->
            <button type="button" id="btnMenu" class="navbar-toggle" data-toggle="collapse"
                    data-target="#myNavBar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="?controlador=Usuario&accion=cerrarSesion">
                <img id="logo" alt="Logo" class="img-responsive"
                     src="public/imgs/store.png"
                     width="60" height="60">
                <!--AGREGAR IMAGEN-->
            </a>
        </div>

        <div class="collapse navbar-collapse" id="myNavBar">
            <!--Modo de visualizacion horizontal-->
            <ul class="nav navbar-nav navbar-right">
                <li><a id="inicio1" href="?controlador=Usuario&accion=inicio">INICIO</a></li>


                <li><a id="inicio1" href="?controlador=Cliente&accion=carritoView">CARRITO</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="contenedor" content="width=device-widt">
    <nav class="navbar navbar-default" style="background-color:  rgba(0, 66, 1, 0.9);">

        <!-- contenedor con 12 columnas--->
        <div class="container">
            <div class="navbar-header">
                <!--Modo de visualizacion vertical-->
                <button type="button" id="btnMenu" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navPro">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navPro">
                <form method="post" action="?controlador=Usuario&accion=filtrarNombre">
                    <!--Modo de visualizacion horizontal-->
                    <ul class="nav navbar-nav navbar-left">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               style="background-color: rgba(0, 0, 1, 0); color: #ffffff !important;"
                               aria-haspopup="true" aria-expanded="false">
                                CATEGORIAS
                            </a>
                            <ul class="dropdown-menu" id="menu"
                                style="background-color: rgba(0, 0, 1, 0.704); color: white; width: auto"
                                aria-labelledby="navbarDropdown">
                                <li><a id="Todos" style="cursor: pointer; background-color: rgba(0, 0, 1, 0);"
                                       onclick="filtrarCategoria(0);return false;">
                                        Todos</a></li>
                                <?php
                                foreach ($_SESSION['categorias'] as $categorias) { ?>
                                    <li><a id="<?php echo $categorias[0] ?>"
                                           style="cursor: pointer; background-color: rgba(0, 0, 1, 0);"
                                           onclick="filtrarCategoria(<?php echo $categorias[0] ?>);return false;">
                                            <?php echo $categorias[1] ?> </a></li>
                                    <?php
                                } ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown"
                               style="background-color: rgba(0, 0, 1, 0); color: #ffffff !important;"
                               aria-haspopup="true" aria-expanded="false">
                                PRECIO
                            </a>
                            <ul class="dropdown-menu" id="menu"
                                style="background-color: rgba(0, 0, 1, 0.704); color: white; width: auto"
                                aria-labelledby="navbarDropdown">
                                <li><a id="asc" style="cursor: pointer; background-color: rgba(0, 0, 1, 0);"
                                       onclick="filtrarPrecio(0);return false;">
                                        Todos</a></li>
                                <li><a id="asc" style="cursor: pointer; background-color: rgba(0, 0, 1, 0);"
                                       onclick="filtrarPrecio(1);return false;">
                                        Ascendente</a></li>
                                <li><a id="desc" style="cursor: pointer; background-color: rgba(0, 0, 1, 0);"
                                       onclick="filtrarPrecio(2);return false;">
                                        Descendente</a></li>

                            </ul>
                        </li>

                        <li><input id="nombre" name="nombre" type="text" class="form-control" style="margin-top: 7px"
                                   placeholder="Nombre del artículo"></li>
                        <li><input type="submit" class="btn btn-success" style="margin-top: 7px" value="Buscar"></li>

                    </ul>
                </form>
            </div>
        </div>
    </nav>
</div>