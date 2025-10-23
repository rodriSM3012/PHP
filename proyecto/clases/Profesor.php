<!-- asignatura (solo 1) titular=bool  -->
<?php
class Profesor extends Miembro
{
    private $asignatura;
    private bool $titular;
    public function __construct($id, $nombre, $apellidos, $email, $asignatura)
    {
        parent::__construct($id, $nombre, $apellidos, $email);
        $this->asignatura = $asignatura;
    }

    public function __toString()
    {
        return "Nombre: $this->nombre $this->apellidos, Email: $this->email";
    }

    public static function crearProfesoresDeMuestra()
    {
        $profesor = [
            new Profesor(1, "Steve", "Wozniak", "steve@apple.com", "DWES"),
            new Profesor(2, "Ada", "Lovelace", "ada@gmail.com", "DIW"),
            new Profesor(3, "Taylor", "Otwell", "taylor@laravel.com", "DWEC"),
            new Profesor(4, "Rasmus", "Lerdoff", "rasmus@php.com", "DAW"),
        ];
        return $profesor;
    }
}
