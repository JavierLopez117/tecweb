<?php
    require_once 'API/Productos.php';//USO DE NAMESPACES

    $actualizar = new Productos('marketzone');
    $jsonOBJ = json_decode(json_encode($_POST));
    $actualizar->edit($jsonOBJ);
    echo $actualizar->getResponse();

?>