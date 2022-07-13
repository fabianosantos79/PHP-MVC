<?php

    use App\core\Model;

    class User extends Model{

        public $nome;
        public $email;
        public $senha;

        //Gravar dados no BD
        public function save(){
            $sql = "INSERT INTO users (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, $this->nome);
            $stmt->bindValue(2, $this->email);
            $stmt->bindValue(3, $this->senha);
            
            if($stmt->execute()){
                return "<script>M.toast({html: 'Cadastrado com sucesso!'})</script>";
            }else{
                return "<script>M.toast({html: 'Erro ao cadastrar.'})</script>";
            }
        }

}