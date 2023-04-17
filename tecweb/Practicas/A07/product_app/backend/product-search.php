<?php
    require_once 'API/Productos.php';//USO DE NAMESPACES

    $buscar = new Productos('marketzone');
    $buscar->search( $_GET['search'] );
    echo $buscar->getResponse();
?>