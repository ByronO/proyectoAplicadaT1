<?php

require 'model/ProductModel.php';

class DefaultController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function AccionDefault()
    {
        $product = new ProductModel();

        $data['products'] = $product->getProducts();

        $this->view->show('indexView.php', $data);
    }
}

?>