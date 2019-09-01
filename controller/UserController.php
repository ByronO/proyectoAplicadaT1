<?php

require 'model/ProductModel.php';

class UserController
{

    public function __construct()
    {
        $this->view = new View();
    }


    public function sessionView()
    {
        $this->view->show('sessionView.php', NULL);

    }

    public function session()
    {
        $product = new ProductModel();
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if ($user == 'admin' && $pass == 'admin123') {

            $data['products'] = $product->getProducts();

            $this->view->show('adminView.php', $data);

        } else {
            $this->view->show('sessionView.php', NULL);

        }

    }

}