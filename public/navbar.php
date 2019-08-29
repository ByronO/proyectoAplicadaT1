<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Audio World</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?controlador=Product&accion=home">Inicio

                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                       data-toggle="dropdown" style="background-color: rgba(0, 0, 1, 0); color: #ffffff !important;"
                       aria-haspopup="true" aria-expanded="false">
                        Gestionar productos
                    </a>
                    <ul class="dropdown-menu" id="menu"
                        style="background-color: rgba(0, 0, 1, 0.704); color: white; width: auto"
                        aria-labelledby="navbarDropdown">
                        <li class="nav-item">
                            <a class="nav-link" href="?controlador=Product&accion=registerProductView">Registrar producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?controlador=Product&accion=delete_updateView">Actualizar productos</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="?controlador=Product&accion=code">Solicitar codigo</a>
                </li>
            </ul>
        </div>
    </div>
</nav>