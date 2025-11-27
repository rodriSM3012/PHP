<?php
class Enemy
{
    // atributos
    private $id; // identificador unico para cada enemigo
    private $name; // nombre del enemigo
    private $description; // descripcion del enemigo
    private $isBoss; // booleano: true → es un jefe (enemigo mas poderoso); false → enemigo basico
    private $health; // puntos de vida del enemigo
    private $strength; // puntos de fuerza del enemigo
    private $defense; // puntos de defensa del enemigo
    private $img; // nombre del archivo de la imagen asociada al enemigo
    private $db;

    // getters y setters
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
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getIsBoss()
    {
        return $this->isBoss;
    }

    /**
     * @param $isBoss
     */
    public function setIsBoss($isBoss)
    {
        $this->isBoss = $isBoss;
        return $this;
    }

    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
        return $this;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param $strength
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;
        return $this;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
        return $this;
    }

    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param $img
     */
    public function setImg($img)
    {
        $this->img = $img;
        return $this;
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
        return $this;
    }

    public function __construct($db)
    {
        $this->db = $db;
    }

    function save()
    {
        if ($this->id) {
            $stmt = $this->db->prepare(
                "UPDATE enemies 
                 SET name = :name, 
                 description = :description, 
                 isBoss = :isBoss,
                 health = :health, 
                 strength = :strength, 
                 defense = :defense, 
                 img = :img 
                 WHERE id = :id"
            );
            $stmt->bindParam(':id', $this->id);
        } else {
            $stmt = $this->db->prepare(
                "INSERT INTO enemies (name, description, isBoss, health, strength, defense, img) 
                 VALUES (:name, :description, :isBoss, :health, :strength, :defense, :img)"
            );
        }
        $stmt->bindParam(':name', $this->getName());
        $stmt->bindParam(':description', $this->getDescription());
        $stmt->bindParam(':isBoss', $this->getIsBoss());
        $stmt->bindParam(':health', $this->getHealth());
        $stmt->bindParam(':strength', $this->getStrength());
        $stmt->bindParam(':defense', $this->getDefense());
        $stmt->bindParam(':img', $this->getImg());
        return $stmt->execute();
    }

    public function loadById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM enemies WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->description = $data['description'];
            $this->isBoss = $data['isBoss'];
            $this->health = $data['health'];
            $this->strength = $data['strength'];
            $this->defense = $data['defense'];
            $this->img = $data['img'];
            return true;
        }
        return false;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM enemies");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}