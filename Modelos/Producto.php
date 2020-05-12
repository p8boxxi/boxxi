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
    

    protected function registraProducto($categoria, $nombre, $subtitulo, $stock, $precio, $descripcion, $foto1, $foto2, $foto3){
        $this->setId_categoria($categoria);
        $this->setNombre($nombre);
        $this->setSubtitulo($subtitulo);
        $this->setStock($stock);
        $this->setPrecio($precio);
        $this->setDescripcion($descripcion);
        $this->setFoto1($foto1);
        $this->setFoto2($foto2);
        $this->setFoto3($foto3);

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlProducto = "INSERT INTO productos (id_producto, id_categoria, nombre, subtitulo, stock, precio, descripcion, foto1, foto2, foto3) 
                    VALUES (null, :id_categoria, :nombre, :subtitulo, :stock, :precio, :descripcion, :foto1, :foto2, :foto3) ";
            $resultado = $conecta->getConexionBD()->prepare($sqlProducto);
            $resultado->execute(array(
                                    ":id_categoria" => $this->getId_categoria(),
                                    ":nombre" => $this->getNombre(),
                                    ":subtitulo" => $this->getSubtitulo(),
                                    ":stock" => $this->getStock(),
                                    ":precio" => $this->getPrecio(),
                                    ":descripcion" => $this->getDescripcion(),
                                    ":foto1" => $this->getFoto1(),
                                    ":foto2" => $this->getFoto2(),
                                    ":foto3" => $this->getFoto3()
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

    protected function actualizaProducto($categoria){
        //poso a valor 1 (=sin nombre, com un "null")    /*** ATENCIO: codigo en CATEGORIAS */
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "UPDATE productos SET id_categoria = 1 WHERE id_categoria = $categoria";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false;  
        }
    }

    protected function eliminaProducto($producto){
        try{
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sentenciaSQL = "DELETE FROM productos
                                    WHERE id_producto = $producto";
            $intencio = $conecta->getConexionBD()->prepare($sentenciaSQL);
            $intencio->execute();
            $conecta->getConexionBD()->commit();
            return true;  
        }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
        }
    }


    protected function modificaProducto($id, $nombre, $subtitulo, $stock, $precio, $descripcion, $foto1, $foto2, $foto3){
        $this->setId_producto($id);
        $this->setNombre($nombre);
        $this->setSubtitulo($subtitulo);
        $this->setStock($stock);
        $this->setPrecio($precio);
        $this->setDescripcion($descripcion);
        $this->setFoto1($foto1);
        $this->setFoto2($foto2);
        $this->setFoto3($foto3);

        try{    
            $conecta = new ConexionBD();
            $conecta->getConexionBD()->beginTransaction();
            $sqlProducto = "UPDATE productos 
                                SET nombre = :nombre, 
                                    subtitulo =:subtitulo, 
                                    stock = :stock, 
                                    precio = :precio, 
                                    descripcion = :descripcion,
                                    foto1 = :foto1,
                                    foto2 = :foto2, 
                                    foto3 = :foto3
                                WHERE id_producto = :producto"; 
            $resultado = $conecta->getConexionBD()->prepare($sqlProducto);
            $resultado->execute(array(
                                    ":nombre" => $this->getNombre(),
                                    ":subtitulo" => $this->getSubtitulo(),
                                    ":stock" => $this->getStock(),
                                    ":precio" => $this->getPrecio(),
                                    ":descripcion" => $this->getDescripcion(),
                                    ":foto1" => $this->getFoto1(),
                                    ":foto2" => $this->getFoto2(),
                                    ":foto3" => $this->getFoto3(),
                                    ":producto" => $this->getId_producto()
                                ));
            $conecta->getConexionBD()->commit();  
            return true;
         }catch(Exception $excepcio){
            $conecta->getConexionBD()->rollback();  
            return false; 
        }
    }




    public function getId_producto()
    {
        return $this->id_producto;
    }

    public function setId_producto($id_producto)
    {
        $this->id_producto = $id_producto;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

  
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getSubtitulo()
    {
        return $this->subtitulo;
    }

    public function setSubtitulo($subtitulo)
    {
        $this->subtitulo = $subtitulo;

        return $this;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFoto1()
    {
        return $this->foto1;
    }

    public function setFoto1($foto1)
    {
        $this->foto1 = $foto1;

        return $this;
    }

    public function getFoto2()
    {
        return $this->foto2;
    }

 
    public function setFoto2($foto2)
    {
        $this->foto2 = $foto2;

        return $this;
    }

    public function getFoto3()
    {
        return $this->foto3;
    }

    public function setFoto3($foto3)
    {
        $this->foto3 = $foto3;

        return $this;
    }

    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }
}

//


?>