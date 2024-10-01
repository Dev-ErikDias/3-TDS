<?php
include_once(__DIR__.'/../util/Connection.php');

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

        return $result;
    }
}

?>
