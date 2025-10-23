<!-- id nombre apellidos email  -->
<?php
abstract class Miembro
{
    private int $id;
    protected $nombre;
    protected $apellidos;
    protected $email;

    public function __construct($id, $nombre, $apellidos, $email)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
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

    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function __toString()
    {
        return $this->id . " " . $this->nombre . " " . $this->apellidos . " " . $this->email;
    }
}
