<?php
/**
 * Created by PhpStorm.
 * User: Byron Ortiz Rojas
 * Date: 5/25/2019
 * Time: 11:09 p.m.
 */
session_start();


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

        session_start();
        $url = 'http://192.168.1.3:64445/api/values/GetCode';

        $params = array('id' => 1,'name' => 'Audio World', 'address' => 'San José' );
        $content = json_encode($params);
        $header = array(
            "Content-Type: application/json",
            "Content-Length: ".strlen($content)
        );
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => $content,
                'header' => implode("\r\n", $header)
            ));


        $result=file_get_contents($url, false, stream_context_create($options));
        $data = json_decode($result);


        $this->view->show('codeView.php', $data);
    }


}