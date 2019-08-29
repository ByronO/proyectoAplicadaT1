<?php
//configuration

require 'libs/Config.php';

$config = Config::singleton();
$config->set('controllerFolder', 'controller/');
$config->set('modelFolder', 'model/');
$config->set('viewFolder', 'view/');

$config->set('dbhost', '163.178.107.130');
$config->set('dbname', 'bk_aw');
$config->set('dbuser', 'laboratorios');
$config->set('dbpass', 'UCRSA.118');

/*$config->set('dbhost', 'localhost');
$config->set('dbname', 'id9240068_prob');
$config->set('dbuser', 'id9240068_laboratorios');
$config->set('dbpass', 'UCRSA.118');

/*$config->set('dbhost', 'localhost');
$config->set('dbname', 'proyectolenguajes');
$config->set('dbuser', 'root');
$config->set('dbpass', '');*/

?>