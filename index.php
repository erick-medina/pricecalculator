<?php
declare(strict_types=1);

//include all your model files here
require 'Model/customer.php';
require 'Model/products.php';
require 'Model/group.php';

//include all your controllers here
require 'Controller/HomepageController.php';
//save products, customers and groups in session
session_start();
if (!isset($_SESSION)) {
    $controller::$products[] = $_SESSION['products'];
    $controller::$customers[] = $_SESSION['customers'];
    $controller::$customers[] = $_SESSION['groups'] ;
}


//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!
$controller = new HomepageController();
$controller->render();
?>

