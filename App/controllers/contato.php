<?php
    class contato{

        public function email($nome, $email){
            echo 'Nome: '.$nome.'<br>E-mail:'.$email;
        }

        public function index(){
            echo 'Página CONTATO e método INDEX';
        }

        public function telefone(){
            echo 'Página CONTATO o Telefone é 11 96480 5636';
        }

    }
?>