<?php
class Asignatura
{
    private int $id;
    private string $nombre;
    private string $creditos;

    public function __construct($id, $nombre, $creditos)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->creditos = $creditos;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getCreditos(): string
    {
        return $this->creditos;
    }

    /**
     * @param string $creditos
     */
    public function setCreditos(string $creditos): void
    {
        $this->creditos = $creditos;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Id: {$this->id}, Nombre: {$this->nombre}, Creditos: {$this->creditos}";
    }

    public static function crearAsignaturasDePrueba()
    {
        $asignaturas = [
            new Asignatura(1, "DWES", "7 créditos"),
            new Asignatura(2, "DWEC", "6 créditos"),
            new Asignatura(3, "DIW", "4 créditos"),
            new Asignatura(4, "DAW", "4 créditos"),
        ];
        return $asignaturas;
    }
}
