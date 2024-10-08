<?php
include_once(__DIR__.'/../util/Connection.php');
include_once(__DIR__.'/../model/aluno.php');

class alunoDAO{

    private $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function list(){
        $sql = "SELECT * FROM alunos";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $alunos = $this->mapAlunos($result);
        return $alunos;
    }

    private function mapAlunos(array $result){
        $alunos = array();

        foreach ($result as $reg) {
            $aluno = new Aluno();
            $aluno->setId($reg['id']);
            $aluno->setNome($reg['nome']);
            $aluno->setEstrangeiro($reg['estrangeiro']);
            $aluno->setIdade($reg['idade']);

            $curso = new Curso();
            $curso->setID($reg['id_curso']);

            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }

        return $alunos;
    }
}

?>
