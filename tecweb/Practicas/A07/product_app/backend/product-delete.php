<?php
    require_once 'API/Productos.php';//USO DE NAMESPACES

    $eliminar = new Productos('marketzone');
    $eliminar->delete($_POST['id'] );
    echo $eliminar->getResponse();
?>