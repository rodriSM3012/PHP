<?php
class Task
{
    private $db;
    private $id;
    private $name;
    private $description;
    private $status; // int 0 o 1 si esta sin completar o completa

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
        return $this;
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

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    function save()
    {
        if ($this->id) {
            $stmt = $this->db->prepare(
                "UPDATE tasks 
                 SET name = :name, 
                 description = :description, 
                 status = :status,
                 WHERE id = :id"
            );
            $stmt->bindParam(':id', $this->id);
        } else {
            $stmt = $this->db->prepare(
                "INSERT INTO tasks (name, description, status) 
                 VALUES (:name, :description, :status)"
            );
        }
        $stmt->bindParam(':name', $this->getName());
        $stmt->bindParam(':description', $this->getDescription());
        $stmt->bindParam(':status', $this->getStatus());
        return $stmt->execute();
    }

    public function loadById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->description = $data['description'];
            $this->status = $data['status'];
            return true;
        }
        return false;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM tasks");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}