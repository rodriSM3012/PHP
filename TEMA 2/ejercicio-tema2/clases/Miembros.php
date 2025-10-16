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

    public function __toString()
    {
        return $this->id ." " .$this->nombre ." ". $this->apellidos ." ". $this->email;
    }
}
