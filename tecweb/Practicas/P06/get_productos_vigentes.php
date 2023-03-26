<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
	<?php
   
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', '', 'marketzone');	
        
		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
		}

		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE eliminado = 0") ) 
		{
            $consulta = "SELECT * FROM productos WHERE eliminado = 0";
            
			$row = $result->fetch_array(MYSQLI_ASSOC);
            $query = mysqli_query($link,$consulta);
			/** útil para liberar memoria asociada a un resultado con demasiada información */
		}

		$link->close();
	
   
	?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Producto</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTO</h3>

		<br/>
		
		<?php if( isset($row) ) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Unidades</th>
					<th scope="col">Detalles</th>
					<th scope="col">Imagen</th>
					<th scope="col">Eliminado</th>
					</tr>
				</thead>
				<tbody>
                    <?php  foreach($query as $columnas)   {?>
                        <tr>
						<th scope="row"><?= $columnas['id'] ?></th>
						<td><?= $columnas['nombre'] ?></td>
						<td><?= $columnas['marca'] ?></td>
						<td><?= $columnas['modelo'] ?></td>
						<td><?= $columnas['precio'] ?></td>
						<td><?= $columnas['unidades'] ?></td>
						<td><?= utf8_encode($columnas['detalles']) ?></td>
						<td><img width = "150px"  height = "130px" src=<?= $columnas['imagen'] ?> ></td>
						<td><?= $columnas['eliminado'] ?></td>
					</tr>
                        <?php }?>
                    
				</tbody>
			</table>

	

		<?php endif; ?>
	</body>
</html>