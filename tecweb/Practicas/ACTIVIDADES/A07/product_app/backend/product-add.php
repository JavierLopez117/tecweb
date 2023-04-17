<?php
require_once 'API/Productos.php';//USO DE NAMESPACES

    $Crear = new Productos('marketzone');
    $Crear->add( json_decode( json_encode($_POST) ) );
    echo $Crear->getResponse();

?>