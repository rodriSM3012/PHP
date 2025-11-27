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

    public function setDb($db): self
    {
        $this->db = $db;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;
        return $this;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio): self
    {
        $this->precio = $precio;
        return $this;
    }

    public static function getAll($db)
    {
        $stmt = $db->query("SELECT * FROM pizzas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        if (isset($this->id)) {
            $sql = "UPDATE pizzas 
                    SET 
                        nombre = :nombre, descripcion = :descripcion, precio = :precio, imagen = :imagen
                        WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $this->id);
        } else {
            $sql = "INSERT INTO pizzas 
                        (nombre, descripcion, precio, imagen)
                    VALUES
                        (:nombre, :descripcion, :precio, :imagen)";
            $stmt = $this->db->prepare($sql);
        }
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':descripcion', $this->descripcion);
        $stmt->bindParam(':precio', $this->precio);
        $stmt->bindParam(':imagen', $this->imagen);

        return $stmt->execute();
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
