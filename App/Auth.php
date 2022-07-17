<?php
namespace App;
use App\core\Model;

    class Auth{

        public static function login($email, $senha){
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = Model::getConn()->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
                if(password_verify($senha, $resultado['senha'])){
                    $_SESSION['logado'] = true;
                    $_SESSION['userId'] = $resultado['id'];
                    $_SESSION['userNome'] = $resultado['nome'];
                    $_SESSION['userLevel'] = $resultado['level'];
                    header('Location: /home/index');
                }else{
                    return "Senha inválida";
                }
            }else{
                return "E-mail invalido";
            }
        }

        public static function logout(){
            unset($_SESSION['logado']);
            session_destroy();
            header('Location: /home/login');
        }

        public static function checkLogin(){
            if(!isset($_SESSION['logado'])){
                header('Location: /home/login');
                die;
            }
        }

        public static function checkLoginAdmin(){
            if($_SESSION['userLevel'] != 2){
                header('Location: /notes/criar');
                die;
            }
        }
    }
?>