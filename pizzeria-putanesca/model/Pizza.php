<?php
class Pizza
{
    private $db;
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $precio;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public static function getAll($db)
    {
        $stmt = $db->query("SELECT * FROM pizzas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loadById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pizzas WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $pizza = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($pizza) {
            $this->id = $pizza['id'];
            $this->nombre = $pizza['nombre'];
            $this->descripcion = $pizza['descripcion'];
            $this->precio = $pizza['precio'];
            $this->imagen = $pizza['imagen'];
            return true;
        }
        return false;
    }
}


