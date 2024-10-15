<?php
include_once(__DIR__.'/../util/Connection.php');
include_once(__DIR__.'/../model/curso.php');


class CursoDAO{

    private $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT * FROM cursos";
        
        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $cursos = $this->mapCursos($result);

        return $cursos;
    }

    private function mapCursos(array $result){
        $cursos = array();

        foreach ($result as $reg) {
            $curso = new Curso();
            $curso->setID($reg['id']);
            $curso->setNome($reg['nome']);
            $curso->setTurno($reg['turno']);

            array_push($cursos, $curso);
        }

        return $cursos;
    }
}

?>
