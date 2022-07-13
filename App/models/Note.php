<?php

    use App\core\Model;

    class Note extends Model{
    
        public $titulo;
        public $texto;



        //Consulta por toda tabela
        public function getAll(){

            $sql = "SELECT * FROM notes";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }
        }



        //Consulta por ID
        public function findId($id)
        {
            $sql = "SELECT * FROM notes WHERE id = $id";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue('id', $id);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }
        }



        //Gravar dados no BD
        public function save(){
            $sql = "INSERT INTO notes (titulo, texto) VALUES (?, ?)";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, $this->titulo);
            $stmt->bindValue(2, $this->texto);
            
            if($stmt->execute()){
                return "<script>M.toast({html: 'Cadastrado com sucesso!'})</script>";
            }else{
                return "<script>M.toast({html: 'Erro ao cadastrar'})</script>";
            }
        }



        //Editar um registro
        public function update($id){
            $sql = "UPDATE notes SET titulo = ?, texto = ? WHERE id = ?";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, $this->titulo);
            $stmt->bindValue(2, $this->texto);
            $stmt->bindValue(3, $id);

            if($stmt->execute()){
                return "<script>M.toast({html: 'Atualizado com sucesso!'})</script>";
            }else{
                return "<script>M.toast({html: 'Erro ao atualizar'})</script>";
            }
        }



        //Deletar um registro
        public function delete($id){
            $sql = "DELETE FROM notes WHERE id = ?";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, $id);

            if($stmt->execute()){
                return "<script>M.toast({html: 'Excluído com sucesso!'})</script>";
            }else{
                return "<script>M.toast({html: 'Erro ao excluir'})</script>";
            }
            
        }
     
        public function search($search)
        {
            $sql = "SELECT * FROM notes WHERE titulo LIKE ? COLLATE utf8_general_ci";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, "%{$search}%");
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return [];
            }
        }

    }

?>