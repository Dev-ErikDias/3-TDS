<?php
include_once(__DIR__."/../util/Connection.php");
include_once(__DIR__."/../model/aluno.php");
include_once(__DIR__."/../model/curso.php");

class AlunoDao{

    private $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function delete($id){
       $sql = "DELETE FROM alunos WHERE id=?";
       $stm=$this->conn->prepare($sql);
       $stm->execute(array($id));
    }

    public function insert(Aluno $alunos){
        $sql = "INSERT INTO alunos(nome, idade, estrangeiro, id_curso)
                VALUES (?,?,?,?)";
        $stm=$this->conn->prepare($sql);
        $stm->execute(array($alunos->getNome(),
                            $alunos->getIdade(),
                            $alunos->getEstrangeiro(),
                            $alunos->getCurso()->getId()));
    }

    public function list(){
        $sql = "SELECT a.*, c.nome curso_nome, c.turno curso_turno 
        FROM alunos a 
        JOIN cursos c ON (c.id= a.id_curso)";

        $stm =$this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $alunos = $this->mapAlunos($result);
        return $alunos;
    }

    public function findById(int $id) {
        $sql = "SELECT a.*, c.nome curso_nome, c.turno curso_turno
                FROM alunos a
                JOIN cursos c ON (c.id = a.id_curso)
                WHERE a.id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        //Criar o objeto Aluno
        $alunos = $this->mapAlunos($result);

        if(count($alunos) == 1)
            return $alunos[0];
        elseif(count($alunos) == 0)
            return null;

        die("AlunoDAO.findById - Erro: mais de um aluno".
                " encontrado para o ID " . $id);
    }


    public function update(Aluno $aluno) {
        $conn = Connection::getConnection();

        $sql = "UPDATE alunos SET nome = ?, idade = ?,". 
            " estrangeiro = ?, id_curso = ?".
            " WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([$aluno->getNome(), $aluno->getIdade(), 
                        $aluno->getEstrangeiro(), $aluno->getCurso()->getId(),
                        $aluno->getId()]);
    }
   
    private function mapAlunos(array $result){

        $alunos = array();

        foreach($result as $reg){
            $aluno = new Aluno();
            $aluno->setId($reg["id"]);
            $aluno->setIdade($reg["idade"]);
            $aluno->setNome($reg["nome"]);
            $aluno->setEstrangeiro($reg["estrangeiro"]);

            $curso = new Curso();
            $curso->setId($reg['id_curso']);
            $curso->setNome(($reg['curso_nome']));
            $curso->setTurno($reg['curso_turno']);
            $aluno->setCurso($curso);

            array_push($alunos, $aluno);
        }

        return $alunos;
    }
}
?>
