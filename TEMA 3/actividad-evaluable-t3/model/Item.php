<?php
class Item
{
    // atributos
    private $id; // identificador unico para cada item
    private $name; // nombre del item
    private $description; // descripcion del item
    private $type; // tipo de objeto
    private $effect; // numero para determinar el impacto del item
    private $img; // nombre del archivo de la imagen asociada al item
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

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

    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getEffect()
    {
        return $this->effect;
    }

    /**
     * @param $effect
     */
    public function setEffect($effect)
    {
        $this->effect = $effect;
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

    function save()
    {
        if ($this->id) {
            $stmt = $this->db->prepare(
                "UPDATE items 
                 SET name = :name, 
                 description = :description, 
                 type = :type,
                 effect = :effect,
                 img = :img 
                 WHERE id = :id"
            );
            $stmt->bindParam(':id', $this->id);
        } else {
            $stmt = $this->db->prepare(
                "INSERT INTO items (name, description, type, effect, img) 
                 VALUES (:name, :description, :type, :effect, :img)"
            );
        }
        $stmt->bindParam(':name', $this->getName());
        $stmt->bindParam(':description', $this->getDescription());
        $stmt->bindParam(':type', $this->getType());
        $stmt->bindParam(':effect', $this->getEffect());
        $stmt->bindParam(':img', $this->getImg());
        return $stmt->execute();
    }

    public function loadById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM items WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->description = $data['description'];
            $this->type = $data['type'];
            $this->effect = $data['effect'];
            $this->img = $data['img'];
            return true;
        }
        return false;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM items");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}