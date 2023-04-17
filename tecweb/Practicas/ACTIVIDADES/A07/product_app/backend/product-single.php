<?php
require_once 'API/Productos.php';//USO DE NAMESPACES
    
    $single = new Productos('marketzone');
    $single->single($_POST['id']);
    echo $single->getResponse();
?>