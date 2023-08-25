<?php
 require '../vendor/autoload.php';

 $pelicula = new tecweb\Pelicula;

 if($_SERVER['REQUEST_METHOD']==='POST'){

    if($_POST['accion']==='Registrar'){

           if(empty($_POST['titulo']))
           exit('Agregar un titulo!!');

           if(empty($_POST['descripcion']))
           exit('Agregar una descripcion!!');

           if(empty($_POST['categoria_id']))
           exit('Selecciona una Categoria!!');

           if(! is_numeric($_POST['categoria_id']))
           exit('Selecciona una categoria valida!!');



           $_params = array (
            'titulo'=> $_POST['titulo'],
            'descripcion'=> $_POST['descripcion'],
            'imagen'=> registroImagen(),
            'categoria_id'=> $_POST['categoria_id']
           );

           $rpt = $pelicula->registrar($_params);
           
           if ($rpt)
               header('Location: peliculas/index.php');
               else
               print'Error al registrar';

    }

    if($_POST['accion']==='Actualizar'){
      if(empty($_POST['titulo']))
      exit('Agregar un titulo!!');

      if(empty($_POST['descripcion']))
      exit('Agregar una descripcion!!');

      if(empty($_POST['categoria_id']))
      exit('Selecciona una Categoria!!');

      if(! is_numeric($_POST['categoria_id']))
      exit('Selecciona una categoria valida!!');



      $_params = array (
       'titulo'=> $_POST['titulo'],
       'descripcion'=> $_POST['descripcion'],
       'categoria_id'=> $_POST['categoria_id'],
       'id'=> $_POST['id']
      );

      if(!empty($_POST['imagen_temp']))
      $_params['imagen'] =$_POST ['imagen_temp'];

      if(!empty($_POST['imagen']['name']))
      $_params['imagen'] = registroImagen();


      $rpt = $pelicula->actualizar($_params);      
           if($rpt)
               header('Location: peliculas/index.php');
               else
               print'Error al actualizar';      
    }



 }
 if($_SERVER['REQUEST_METHOD']==='GET'){
   $id = $_GET['id'];
   $rpt = $pelicula->eliminar($id);      
           if($rpt)
               header('Location: peliculas/index.php');
               else
               print'Error al eliminar elemento';      
    }
 

 function registroImagen(){
    $carpeta = __DIR__.'../../img/';

    $archivo=$carpeta.$_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'],$archivo);
    return $_FILES['imagen']['name'];

 }