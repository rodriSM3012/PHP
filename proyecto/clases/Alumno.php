<!-- edad asignatura[] cursoAbonado=bool  -->
<?php
class Alumno extends Miembro
{
    private $edad;
    private array $asignaturas;
    private bool $cursoAbonado;

    // getters y setters 
    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getAsignaturas()
    {
        return $this->asignaturas;
    }

    public function setAsignaturas($asignaturas)
    {
        $this->asignaturas = $asignaturas;
    }

    public function getCursoAbonado(): bool
    {
        return $this->cursoAbonado;
    }

    public function setCursoAbonado(bool $cursoAbonado): void
    {
        $this->cursoAbonado = $cursoAbonado;
    }

    public function __construct($id, $nombre, $apellidos, $email, $asignaturas)
    {
        parent::__construct($id, $nombre, $apellidos, $email);
        $this->asignaturas = $asignaturas;
    }

    public function abonarCurso(): void
    {
        $this->cursoAbonado = true;
    }

    public function matricularEnAsignatura(Asignatura $asignaturas): void
    {
        foreach ($this->asignaturas as $asignaturaMatriculada) {
            if ($asignaturaMatriculada->getId() == $asignaturas->getId()) {
                return;
            }
        }
        $this->asignaturas[] = $asignaturas;
    }

    public function __tostring(): string
    {
        return "Nombre : $this->nombre $this->apellidos, Email: $this->email";
    }

    public static function crearAlumnosDeMuestra()
    {
        $alumnos = [
            new Alumno(1, "Laura", "Martínez", "laura.martinez@email.com", 22),
            new Alumno(2, "Sergio", "López", "sergio.lopez@email.com", 25),
            new Alumno(3, "Carlos", "García", "carlos.garcia@email.com", 24),
            new Alumno(4, "Marta", "Sánchez", "marta.sanchez@email.com", 23),
            new Alumno(5, "Alba", "Fernández", "alba.fernandez@email.com", 21),
            new Alumno(6, "David", "Rodríguez", "david.rodriguez@email.com", 26),
            new Alumno(7, "Lucía", "Jiménez", "lucia.jimenez@email.com", 20),
            new Alumno(8, "Jorge", "Pérez", "jorge.perez@email.com", 22),
            new Alumno(9, "Elena", "Romero", "elena.romero@email.com", 23),
            new Alumno(10, "Pablo", "Torres", "pablo.torres@email.com", 24),
        ];
        return $alumnos;
    }
}
