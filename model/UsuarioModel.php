<?php

class UsuarioModel
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();

    }//constructor

    /*FUNCION QUE ENVIA LOS DATOS OBTENIDOS EN EL CONTROLLER AL PROCEDIMIENTO ALMACENADO
QUE CORRESPONDE*/
    public function crearUsuario($nombre, $contra, $rol)
    {
        $consulta = $this->db->prepare('call sp_agregarUsuario(?, ?, ?)');
        $consulta->bindParam("1", $nombre, PDO::PARAM_STR, 50);
        $consulta->bindParam("2", $contra, PDO::PARAM_STR, 20);
        $consulta->bindParam("3", $rol, PDO::PARAM_INT, 4);

        $consulta->execute();
        $consulta->CloseCursor();

    }

    /*FUNCION QUE ENVIA LOS DATOS OBTENIDOS EN EL CONTROLLER AL PROCEDIMIENTO ALMACENADO
QUE CORRESPONDE*/
    public function actualizarUsuario($id,$nombre, $contra)
    {
        $consulta = $this->db->prepare('call sp_actualizarUsuario(?, ?, ?)');
        $consulta->bindParam("1", $id, PDO::PARAM_INT, 4);
        $consulta->bindParam("2", $nombre, PDO::PARAM_STR, 50);
        $consulta->bindParam("3", $contra, PDO::PARAM_STR, 20);

        $consulta->execute();
        $consulta->CloseCursor();

    }

    /*FUNCION QUE ENVIA LOS DATOS OBTENIDOS EN EL CONTROLLER AL PROCEDIMIENTO ALMACENADO
QUE CORRESPONDE*/
    public function eliminarUsuario($id)
    {
        $consulta = $this->db->prepare('call sp_eliminarUsuario(?)');
        $consulta->bindParam("1", $id, PDO::PARAM_INT, 4);

        $consulta->execute();
        $consulta->CloseCursor();

    }

    /*FUNCION QUE VERIFICA SI EL USUARIO QUE QUIERE INICIAR SESION YA ESTA REGISTRADO
    EN LA BASE DE DATOS*/
    public function verificar($usuario, $contra)
    {
        $consulta = $this->db->prepare('call sp_verificar(?, ?)');
        $consulta->bindParam("1", $usuario, PDO::PARAM_STR, 50);
        $consulta->bindParam("2", $contra, PDO::PARAM_STR, 20);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerIdUsuario($usuario, $contra)
    {
        $consulta = $this->db->prepare('call sp_obtenerIdUsuario(?, ?)');
        $consulta->bindParam("1", $usuario, PDO::PARAM_STR, 50);
        $consulta->bindParam("2", $contra, PDO::PARAM_STR, 20);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    /*FUNCION QUE RETORNA TODOS LOS USUARIOS REGISTRADOS*/
    public function obtenerUsuarios()
    {
        $consulta = $this->db->prepare('call sp_obtenerUsuarios()');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    /*FUNCION QUE RETORNA UN USUARIO EN ESPECIFICO*/
    public function obtenerUsuario($usuario)
    {
        $consulta = $this->db->prepare('call sp_obtenerUsuario(?)');
        $consulta->bindParam("1", $usuario, PDO::PARAM_INT, 4);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    /*FUNCION QUE OBTIENE TODOS LOS PERMISOS QUE TIENE ASIGNADOS UN USUARIO SEGUN SU ROL*/
    public function obtenerPermisos($usuario)
    {
        $consulta = $this->db->prepare('call sp_obtenerpermisos(?)');
        $consulta->bindParam("1", $usuario, PDO::PARAM_STR, 50);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    /*FUNCION QUE RETORNA TODOS LOS ROLES QUE SE PUEDEN ASIGNAR A UN USUARIO*/
    public function obtenerRoles()
    {
        $consulta = $this->db->prepare('call sp_obtenerRoles()');
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    /*FUNCION QUE CREA EL ROL EN LA BD CON EL NOMBRE OBTENIDO EN EL CONTROLLER*/
    public function crearRol($nombreRol)
    {
        $consulta = $this->db->prepare('call sp_agregarRol(?)');
        $consulta->bindParam("1", $nombreRol, PDO::PARAM_STR, 50);
        $consulta->execute();
        $consulta->CloseCursor();

    }

    /*FUNCION QUE AGREGA LOS PERMISOS A UN ROL ESPECIFICO*/
    public function agregarPermisos($idRol, $permiso)
    {
        $consulta = $this->db->prepare('call sp_agregarPermisos(?, ?)');
        $consulta->bindParam("1", $idRol, PDO::PARAM_INT, 4);
        $consulta->bindParam("2", $permiso, PDO::PARAM_INT, 4);
        $consulta->execute();
        $consulta->CloseCursor();

    }

    /*FUNCION QUE OBTIENE EL ID DE UN ROL EN ESPECIFICO*/
    public function obtenerIdRol($nombreRol)
    {
        $consulta = $this->db->prepare('call sp_obtenerId(?)');
        $consulta->bindParam("1", $nombreRol, PDO::PARAM_STR, 50);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    /*FUNCION QUE OBTIENE TODOS LOS ARTICULOS PARA DESPLEGARLOS EN PANTALLA*/
    public function obtenerTodosArticulos()
    {
        $consulta = $this->db->prepare('call sp_obtenerTodosArticulos()');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    public function obtenerTodosArticulosDispo()
    {
        $consulta = $this->db->prepare('call sp_obtenerTodosArticulosDispo()');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    public function obtenerCombosTop()
    {
        $consulta = $this->db->prepare('call sp_obtenerCombosTop()');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }

    public function obtenerArtiCombosTop($combo1, $combo2, $combo3, $combo4)
    {
        $consulta = $this->db->prepare('call sp_obtenerArtiCombosTop(?, ?, ?, ?)');
        $consulta->bindParam("1", $combo1, PDO::PARAM_INT, 4);
        $consulta->bindParam("2", $combo2, PDO::PARAM_INT, 4);
        $consulta->bindParam("3", $combo3, PDO::PARAM_INT, 4);
        $consulta->bindParam("4", $combo4, PDO::PARAM_INT, 4);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();
        return $resultado;
    }

    /*FUNCION QUE OBTIENE TODAS LAS CATEGORIAS*/
    public function obtenerCategorias()
    {
        $consulta = $this->db->prepare('call sp_obtenerCategorias()');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;

    }

    public function filtrarCategoria($categoria)
    {
        $consulta = $this->db->prepare('call sp_obtenerTodosArticulosCat(?)');
        $consulta->bindParam("1", $categoria, PDO::PARAM_INT, 4);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;

    }

    public function filtrarPrecioAsc()
    {
        $consulta = $this->db->prepare('call sp_filtrarPrecioAsc()');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;

    }

    public function filtrarPrecioDesc()
    {
        $consulta = $this->db->prepare('call sp_filtrarPrecioDesc()');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;

    }

    public function filtrarNombre($nombre)
    {
        $consulta = $this->db->prepare('call sp_filtrarNombre(?)');
        $consulta->bindParam("1", $nombre, PDO::PARAM_STR, 50);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;

    }

    public function filtrarVentas($fecha1, $fecha2)
    {
        $consulta = $this->db->prepare('call sp_filtrarVentas(?, ?)');
        $consulta->bindParam("1", $fecha1, PDO::PARAM_STR, 20);
        $consulta->bindParam("2", $fecha2, PDO::PARAM_STR, 20);

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;

    }
    public function verVentas()
    {
        $consulta = $this->db->prepare('call sp_obtenerVentas()');

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;

    }

}