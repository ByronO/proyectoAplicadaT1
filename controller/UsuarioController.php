<?php

session_start();
/*
unset($_SESSION['permisosRol']);
unset($_SESSION['contador']);
*/

if (!isset($_SESSION['permisosRol'])) {
    $_SESSION['permisosRol'] = array();
}

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

require 'model/UsuarioModel.php';
require 'libs/cambio.php';
require 'libs/encriptar.php';


class UsuarioController
{

    public function __construct()
    {
        $this->view = new View();
    }

    //FUNCION QUE REDIRECCIONA AL INICIO Y ELIMINA LAS VARIABLES GUARDADAS EN _SESSION
    public function cerrarSesion()
    {
        unset($_SESSION['permisosRol']);
        unset($_SESSION['contador']);
        unset($_SESSION['permisos']);
        unset($_SESSION['usuario']);
        unset($_SESSION['categorias']);
        unset($_SESSION['contador1']);
        unset($_SESSION['articulos']);
        unset($_SESSION['articulosCombo']);
        unset($_SESSION['contadorA']);
        unset($_SESSION['cantidad']);
        $this->view->show('indexView.php', null);
    }

    public function inicio()
    {
        $usuario = new UsuarioModel();
        unset($_SESSION['permisosRol']);
        unset($_SESSION['contador']);
        unset($_SESSION['categorias']);
        unset($_SESSION['categoriasP']);
        unset($_SESSION['contador1']);
        unset($_SESSION['articulos']);
        unset($_SESSION['articulosCombo']);
        unset($_SESSION['contadorA']);
        unset($_SESSION['cantidad']);

        $data['articulos'] = $usuario->obtenerTodosArticulosDispo();
        $fecha = date('d/m/Y');
        $data['cambio'] = tipo_cambio($fecha);
        $_SESSION['articulos'] = $data['articulos'];
        $data['combosTop'] = $usuario->obtenerCombosTop();
        if (!empty($data['combosTop'])) {
            $data['articulosCombos'] = $usuario->obtenerArtiCombosTop($data['combosTop'][0][0], $data['combosTop'][1][0], $data['combosTop'][2][0], $data['combosTop'][3][0]);
        }
        $data['categorias'] = $usuario->obtenerCategorias();

        $_SESSION['combosTop'] = $data['combosTop'];
        if (!empty($data['combosTop'])) {
            $_SESSION['articulosCombos'] = $data['articulosCombos'];
        }
        $_SESSION['categorias'] = $data['categorias'];

        foreach ($_SESSION['permisos'] as $p) {
            if ($p[0] == 10) {
                $this->view->show('cliente.php', $data);
                break;
            } else {
                $this->view->show('administrador.php', $data);
                break;
            }
        }
    }

    public function inicioFiltradoCategoria()
    {
        $usuario = new UsuarioModel();

        unset($_SESSION['permisosRol']);
        unset($_SESSION['contador']);
        unset($_SESSION['categorias']);
        unset($_SESSION['contador1']);
        unset($_SESSION['articulosCombo']);
        unset($_SESSION['contadorA']);
        unset($_SESSION['cantidad']);

        $fecha = date('d/m/Y');
        $data['cambio'] = tipo_cambio($fecha);
        $data['combosTop'] = $usuario->obtenerCombosTop();
        if (!empty($data['combosTop'])) {
            $data['articulosCombos'] = $usuario->obtenerArtiCombosTop($data['combosTop'][0][0], $data['combosTop'][1][0], $data['combosTop'][2][0], $data['combosTop'][3][0]);
        }
        $data['categorias'] = $usuario->obtenerCategorias();

        $_SESSION['combosTop'] = $data['combosTop'];
        if (!empty($data['combosTop'])) {
            $_SESSION['articulosCombos'] = $data['articulosCombos'];
        }
        $_SESSION['categorias'] = $data['categorias'];

        foreach ($_SESSION['permisos'] as $p) {
            if ($p[0] == 10) {
                $this->view->show('cliente.php', $data);
                break;
            } else {
                $this->view->show('administrador.php', $data);
                break;
            }
        }
    }

    /*FUNCION QUE VERIFICA SI EL USUARIO QUE QUIERE INICIAR SESION YA ESTA REGISTRADO
    EN LA BASE DE DATOS, SI ES ASI VERIFICA CUALES SON SUS PERMISOS Y LO REDIRECCIONA
    A LA VISTA DE ADMINISTRADOR O DE CLIENTE SEGUN SUS ROL*/
    public function verificar()
    {
        $usuario = new UsuarioModel();

        $usuarioN = $_POST['usuario'];
        $contra = $_POST['contra'];

        $ecrip = encriptar($contra);

        $data['existe'] = $usuario->verificar($usuarioN, $ecrip);
        $fecha = date('d/m/Y');
        $data['cambio'] = tipo_cambio($fecha);

        foreach ($data['existe'] as $items) {
            if ($items[0] == 1) {
                $_SESSION['usuario'] = $usuario->obtenerIdUsuario($usuarioN, $ecrip);
                $data['permisos'] = $usuario->obtenerPermisos($usuarioN);
                $data['articulos'] = $usuario->obtenerTodosArticulosDispo();
                $data['combosTop'] = $usuario->obtenerCombosTop();
                if (!empty($data['combosTop'])) {
                    $data['articulosCombos'] = $usuario->obtenerArtiCombosTop($data['combosTop'][0][0], $data['combosTop'][1][0], $data['combosTop'][2][0], $data['combosTop'][3][0]);
                }
                $data['categorias'] = $usuario->obtenerCategorias();

                $_SESSION['permisos'] = $data['permisos'];
                $_SESSION['articulos'] = $data['articulos'];
                $_SESSION['combosTop'] = $data['combosTop'];
                if (!empty($data['combosTop'])) {
                    $_SESSION['articulosCombos'] = $data['articulosCombos'];
                }
                $_SESSION['categorias'] = $data['categorias'];

                foreach ($data['permisos'] as $p) {
                    if ($p[0] == 10) {
                        $this->view->show('cliente.php', $data);
                        break;
                    } else {
                        $this->view->show('administrador.php', $data);
                        break;
                    }
                }

            } else {
                $this->view->show('indexView.php', null);
                echo "<script>
                alert('Este usuario no existe');</script>";

            }
        }
    }

    //------------FUNCIONES PARA DESPLEGAR CADA UNA DE LAS VISTAS----------
    public function crearRolForm()
    {
        unset($_SESSION['permisosRol']);
        $this->view->show('registrarMadera.php', null);
    }

    public function seleccionarUsuario()
    {
        unset($_SESSION['permisosRol']);
        $usuario = new UsuarioModel();

        $data['usuarios'] = $usuario->obtenerUsuarios();

        $this->view->show('buscar.php', $data);
    }

    public function crearUsuarioForm()
    {
        unset($_SESSION['permisosRol']);
        $usuario = new UsuarioModel();

        $data['roles'] = $usuario->obtenerRoles();
        $this->view->show('formularioUsuario.php', $data);
    }

    public function actualizarUsuarioForm()
    {
        unset($_SESSION['permisosRol']);
        $usuario = new UsuarioModel();

        $idUsuario = $_POST['usuario'];
        $data['usuario'] = $usuario->obtenerUsuario($idUsuario);
        $_SESSION['usuario'] = $idUsuario;

        $this->view->show('formularioActualizar.php', $data);
    }

    public function eliminarUsuarioForm()
    {
        $usuario = new UsuarioModel();

        $data['usuarios'] = $usuario->obtenerUsuarios();

        $this->view->show('muebleBuscadoView.php', $data);
    }

    public function mostrarInventario()
    {
        $usuario = new UsuarioModel();
        $data['articulos'] = $usuario->obtenerTodosArticulos();
        $this->view->show('inventarioView.php', $data);
    }

    public function verVentas()
    {
        $usuario = new UsuarioModel();
        $data['ventas'] = $usuario->verVentas();
        $this->view->show('verVentasView.php', $data);
    }
    //------------------------------------------------------------------

    /*FUNCION QUE OBTIENE LOS VALORES INGRESADOPS EN EL FORMULARIO
    Y LOS ENVIA AL MODEL PARA QUE SE INSERTE EN LA BASE DE DATOS*/
    public function crearUsuario()
    {
        $usuario = new UsuarioModel();

        $nombre = $_POST['nombre'];
        $contra = $_POST['contra'];
        $rol = $_POST['rol'];

        $ecrip = encriptar($contra);
        $data['existe'] = $usuario->verificar($nombre, $ecrip);

        foreach ($data['existe'] as $items) {
            if ($items[0] == 1) {
                $data['roles'] = $usuario->obtenerRoles();
                $this->view->show('formularioUsuario.php', $data);
            } else {
                $usuario->crearUsuario($nombre, $ecrip, $rol);
                $data['roles'] = $usuario->obtenerRoles();
                $this->view->show('formularioUsuario.php', $data);
            }
        }

    }

    /*FUNCION QUE OBTIENE LOS VALORES INGRESADOPS EN EL FORMULARIO
    Y LOS ENVIA AL MODEL PARA QUE SE ACTUALICE EN LA BASE DE DATOS*/
    public function actualizarUsuario()
    {
        $usuario = new UsuarioModel();

        $nombre = $_POST['nombre'];
        $contra = $_POST['contra'];

         $ecrip= encriptar($contra);

        $usuario->actualizarUsuario($_SESSION['usuario'], $nombre, $ecrip);

        $data['permisos'] = $usuario->obtenerPermisos('admin');
        $this->view->show('administrador.php', $data);

    }

    /*FUNCION QUE OBTIENE LOS VALORES INGRESADOPS EN EL FORMULARIO
    Y LOS ENVIA AL MODEL PARA QUE SE ELIMINE DE LA BASE DE DATOS*/
    public function eliminarUsuario()
    {
        $usuario = new UsuarioModel();

        $idUsuario = $_POST['usuario'];

        $usuario->eliminarUsuario($idUsuario);

        $data['permisos'] = $usuario->obtenerPermisos('admin');
        $this->view->show('administrador.php', $data);

    }

    /*FUNCION QUE ALMACENA EN _SESSION LOS PERMISOS QUE SE LE DESEAN AGREGAR A UN ROL
    PARA POSTERIORMENTE AGREGARLOS A LA BASE DE DATOS JUNTO AL ROL*/
    public function agregarPermiso()
    {
        $idPermiso = $_POST['permiso'];
        $cont = 0;
        $encontro = 0;

        foreach ($_SESSION['permisosRol'] as $pr) {
            if ($pr[$cont] == $idPermiso) {
                $encontro = 1;
            }
        }

        if ($encontro == 0) {
            $_SESSION['permisosRol'][$_SESSION['contador']] = $idPermiso;
            echo "Permiso agregado";
            $_SESSION['contador']++;
        } else {
            echo "Este permiso ya está asignado";
        }
    }

    /*FUNCION QUE OBTIENE LOS VALORES INGRESADOPS EN EL FORMULARIO
    Y LOS QUE SE ALMACENARON EN _SESSION Y LOS ENVIA AL MODEL PARA QUE SE
     INSERTEN EN LA BASE DE DATOS*/
    public function crearRol()
    {
        $usuario = new UsuarioModel();

        $nombreRol = $_POST['nombre'];

        $usuario->crearRol($nombreRol);

        $id = 0;
        $data['id'] = $usuario->obtenerIdRol($nombreRol);
        foreach ($data['id'] as $rol) {
            $id = $rol[0];
        }
        /*SE RECORRE EL ARRAY DE PERMISOS SELECCIONADOS Y SE AGREGAN
        A LA BD MEDIANTE EL MODEL*/
        foreach ($_SESSION['permisosRol'] as $pr) {
            $usuario->agregarPermisos($id, $pr[0]);
        }

        unset($_SESSION['permisosRol']);
        unset($_SESSION['contador']);

        $this->view->show('registrarMadera.php', null);
    }

    /*FUNCION QUE FILTRA POR LA CATEGORIA SELECCIONADA*/
    public function filtrarCategoria()
    {
        unset($_SESSION['articulos']);

        $categoria = $_POST['id'];
        $usuario = new UsuarioModel();


        if ($categoria == 0) {
            $data['articulos'] = $usuario->obtenerTodosArticulosDispo();
            $_SESSION['articulos'] = $data['articulos'];
            echo 'no';
        } else {
            $data['articulos'] = $usuario->filtrarCategoria($categoria);
            $_SESSION['articulos'] = $data['articulos'];
            echo 'filtrada';
        }
    }

    /*FUNCION QUE FILTRA POR PRECIO ASCENDENTE O DESCENDENTE*/
    public function filtrarPrecio()
    {
        unset($_SESSION['articulos']);

        $tipo = $_POST['tipo'];
        $usuario = new UsuarioModel();


        if ($tipo == 0) {
            $data['articulos'] = $usuario->obtenerTodosArticulosDispo();
            $_SESSION['articulos'] = $data['articulos'];
            echo 'no';
        } else if ($tipo == 1) {
            $data['articulos'] = $usuario->filtrarPrecioAsc();
            $_SESSION['articulos'] = $data['articulos'];
            echo 'filtrada';
        } else {
            $data['articulos'] = $usuario->filtrarPrecioDesc();
            $_SESSION['articulos'] = $data['articulos'];
            echo 'filtrada';
        }
    }

    /*FUNCION QUE FILTRA POR NOMBRE*/
    public function filtrarNombre()
    {
        unset($_SESSION['articulos']);

        $nombre = $_POST['nombre'];
        $usuario = new UsuarioModel();


        $data['articulos'] = $usuario->filtrarNombre($nombre);
        $_SESSION['articulos'] = $data['articulos'];

        unset($_SESSION['permisosRol']);
        unset($_SESSION['contador']);
        unset($_SESSION['categorias']);
        unset($_SESSION['contador1']);
        unset($_SESSION['articulosCombo']);
        unset($_SESSION['contadorA']);

        $data['combosTop'] = $usuario->obtenerCombosTop();
        if (!empty($data['combosTop'])) {
            $data['articulosCombos'] = $usuario->obtenerArtiCombosTop($data['combosTop'][0][0], $data['combosTop'][1][0], $data['combosTop'][2][0], $data['combosTop'][3][0]);
        }
        $data['categorias'] = $usuario->obtenerCategorias();

        $_SESSION['combosTop'] = $data['combosTop'];
        if (!empty($data['combosTop'])) {
            $_SESSION['articulosCombos'] = $data['articulosCombos'];
        }
        $_SESSION['categorias'] = $data['categorias'];

        foreach ($_SESSION['permisos'] as $p) {
            if ($p[0] == 10) {
                $this->view->show('cliente.php', $data);
                break;
            } else {
                $this->view->show('administrador.php', $data);
                break;
            }
        }

    }

    /*FUNCION QUE FILTRA LA TABLA DE VENTAS POR FECHA*/
    public function filtrarVentas()
    {
        $usuario = new UsuarioModel();
        $fecha1 = $_POST['anno1'] . "-" . $_POST['mes1'] . "-" . $_POST['dia1'];
        $fecha2 = $_POST['anno2'] . "-" . $_POST['mes2'] . "-" . $_POST['dia2'];


        $data['ventas'] = $usuario->filtrarVentas($fecha1, $fecha2);
        $this->view->show('verVentasView.php', $data);

    }


}