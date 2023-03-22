<?php
    
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
         $result = $conexion->query("SELECT * FROM productos WHERE id like '{$id}' || nombre like '{$id}%' || marca like '{$id}%' || detalles like '{$id}%'");
            // SE OBTIENEN LOS RESULTADOS
        while($row = mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
	
    } 
    $conexion->close();
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>