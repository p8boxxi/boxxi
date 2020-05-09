<?php
    
    require_once "ConexionBD.php";
//GP
class Producto{
    protected $id_producto;
    protected $nombre;
    protected $subtitulo;
    protected $stock;
    protected $precio;
    protected $descripcion;
    protected $foto1;
    protected $foto2;
    protected $foto3;

    protected $id_categoria;
    

    protected function registraProducto(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlProducto = "INSERT INTO productos (id_producto, id_categoria, nombre, subtitulo, stock, precio, descripcion, foto1, foto2, foto3) 
                    VALUES (null, :id_categoria, :nombre, :subtitulo, :stock, :precio, :descripcion, :foto1, :foto2, :foto3) ";
            $resultado = $conecta->getConexionBD()->prepare($sqlProducto);
            $resultado->execute(array(
                                    ":id_categoria" => $this->id_categoria,
                                    ":nombre" => $this->nombre,
                                    ":subtitulo" => $this->subtitulo,
                                    ":stock" => $this->stock,
                                    ":precio" => $this->precio,
                                    ":descripcion" => $this->descripcion,
                                    ":foto1" => $this->foto1,
                                    ":foto2" => $this->foto2,
                                    ":foto3" => $this->foto3
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }

    protected function retornaProductosTodos(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "SELECT * FROM productos";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return $resultat = $intencio->fetchAll(PDO::FETCH_OBJ);
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return null;  
        }
    }

    protected function actualizaProducto(){
        //poso a valor 1 (=sin nombre, com un "null")    /*** ATENCIO: codigo en CATEGORIAS */
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE productos SET id_categoria = 1 WHERE id_categoria = '$this->id_categoria'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
    }

    protected function eliminaProducto(){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "DELETE FROM productos
                                    WHERE id_producto = '$this->id_producto'";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
        }
    }


    protected function modificaProducto(){
        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlProducto = "UPDATE productos 
                                SET nombre = :nombre, 
                                    subtitulo =:subtitulo, 
                                    stock = :stock, 
                                    precio = :precio, 
                                    descripcion = :descripcion,
                                    foto1 = '$this->foto1',
                                    foto2 = '$this->foto2', 
                                    foto3 = '$this->foto3'
                                WHERE id_producto = '$this->id_producto'"; 
            $resultado = $conecta->getConexionBD()->prepare($sqlProducto);
            $resultado->execute(array(
                                    ":nombre" => $this->nombre,
                                    ":subtitulo" => $this->subtitulo,
                                    ":stock" => $this->stock,
                                    ":precio" => $this->precio,
                                    ":descripcion" => $this->descripcion
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }










}

//


?>