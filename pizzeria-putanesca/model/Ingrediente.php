<?php
// nombre, id, db
class Ingrediente
{
    private $db;
    private $nombre;
    private $id;

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

    public static function getAll($db)
    {
        $stmt = $db->query("SELECT * FROM ingredientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        try {
            // comprueba si hay id; si la hay hace update y sino hace insert (porque no hay)
            if ($this->id) {
                $sql = "UPDATE ingredientes
                        SET nombre = :nombre
                        WHERE id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $this->id);
            } else {
                $sql = "INSERT INTO ingredientes
                        (nombre)
                        VALUES
                        (:nombre)";
                $stmt = $this->db->prepare($sql);
            }
            $stmt->bindParam(':nombre', $this->nombre);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al guardar el ingrediente: " . $e->getMessage();
            return false;
        }
    }
}
// llamar a tabla ingrdientes