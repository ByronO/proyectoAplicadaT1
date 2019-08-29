<?php
/**
 * Created by PhpStorm.
 * User: Byron Ortiz Rojas
 * Date: 5/25/2019
 * Time: 11:09 p.m.
 */
session_start();

if (!isset($_SESSION['categorias'])) {
    $_SESSION['categorias'] = array();
}

if (!isset($_SESSION['categoriasP'])) {
    $_SESSION['categoriasP'] = array();
}

if (!isset($_SESSION['contador1'])) {
    $_SESSION['contador1'] = 0;
}

if (!isset($_SESSION['articulosCombo'])) {
    $_SESSION['articulosCombo'] = array();
}

if (!isset($_SESSION['contadorA'])) {
    $_SESSION['contadorA'] = 0;
}

if (!isset($_SESSION['preciosCombo'])) {
    $_SESSION['preciosCombo'] = array();
}

if (!isset($_SESSION['articulos'])) {
    $_SESSION['articulos'] = array();
}

require 'model/ProductModel.php';

class ProductController
{
    public function __construct()
    {
        $this->view = new View();
    }

    //----------FUNCIONES QUE DESPLIEGAN LAS DIFERENTES VISTAS-----------

    public function home()
    {
        //llamar al modelo para traer datos

        $product = new ProductModel();

        $data['products'] = $product->getProducts();

        $this->view->show('indexView.php', $data);
    }

    public function registerProductView()
    {
        $this->view->show('registerProductView.php', null);
    }


    public function delete_updateView()
    {

        $product = new ProductModel();

        $data['products'] = $product->getProducts();

        $this->view->show('delete_updateView.php', $data);

    }

    //--------------------------------------------------------------------

    /*FUNCION QUE OBTIENE LOS VALORES INGRESADOPS EN EL FORMULARIO
    Y LOS ENVIA AL MODEL PARA QUE SE INSERTE EN LA BASE DE DATOS*/
    public function registerProduct()
    {
        $product = new ProductModel();

        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $n = rand(1, 6);

        $path = 'public/imgs/p' . $n . '.jpg';


        $product->registerProduct($name, $price, $description, $path);

        $this->view->show('registerProductView.php', null);

    }

    public function deleteProduct()
    {
        $product = new ProductModel();

        $id = $_POST['id'];

        $product->deleteProduct($id);

    }


    public function updateProduct()
    {

        $product = new ProductModel();

        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $product->updateProduct($id, $name, $price, $description);

    }

    public function code()
    {
        $data['code'] = rand(1, 10000);

        $this->view->show('codeView.php', $data);
    }


}