<?php

    require_once 'API/Productos.php';//USO DE NAMESPACES

    $productos = new Productos('marketzone');
    $productos->list();
    echo $productos->getResponse();

?>