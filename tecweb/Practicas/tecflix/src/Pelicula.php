<?php
namespace tecweb;

use PDO;

class Pelicula{
    private $config;
    private $cn=null;

    public function __construct()
    {
        $this->config = parse_ini_file(__DIR__.'/../config.ini');
        $this->cn=new \PDO($this->config['dns'],$this->config['usuario'],$this->config
        ['clave'],array(\PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8'));
    }
    
    public function registrar($_params){
      $sql ="INSERT INTO `peliculas`(`titulo`, `descripcion`, `imagen`, `categoria_id`)
       VALUES (:titulo,:descripcion,:imagen,:categoria_id)";

      $resultado =$this->cn->prepare($sql);

      $_array  =array(
          ":titulo"=>$_params['titulo'],
          ":descripcion"=>$_params['descripcion'],
          ":imagen"=>$_params['imagen'],
          ":categoria_id"=>$_params['categoria_id'],
      );

      if($resultado->execute($_array))
          return true;

      return false;
    }

    public function actualizar($_params){
      $sql ="UPDATE `peliculas` SET `titulo`=:titulo,`descripcion`= :descripcion,`imagen`= :imagen,`categoria_id`=:categoria_id WHERE `id`=:id";

      $resultado =$this->cn->prepare($sql);

      $_array  =array(
          ":titulo"=>$_params['titulo'],
          ":descripcion"=>$_params['descripcion'],
          ":imagen"=>$_params['imagen'],
          ":categoria_id"=>$_params['categoria_id'],
          ":id"=>$_params['id']
      );

      if($resultado->execute($_array))
          return true;
      return false;
    }
    public function eliminar($id){
      $sql ="DELETE FROM `peliculas` WHERE `id`=:id";
      $resultado =$this->cn->prepare($sql);
           $_array  = array(
                ":id" => $id
      );

      if($resultado->execute($_array))
          return true;
      return false;
    }

    public function mostar(){
      $sql ="SELECT peliculas.id,titulo,descripcion,imagen,nombre FROM peliculas 
      
      INNER JOIN categorias
      ON peliculas.categoria_id = categorias.id ORDER BY peliculas.id DESC";
      $resultado =$this->cn->prepare($sql);

      if($resultado->execute())
          return $resultado->fetchAll();
      return false;

    }
    public function mostrarPorId($id){
      $sql ="SELECT * FROM `peliculas` WHERE `id`=:id";

      $resultado =$this->cn->prepare($sql);
      $_array  = array(
        ":id" => $id
      );

      if($resultado->execute())
          return $resultado->fetch();
          
      return false;
    }
}