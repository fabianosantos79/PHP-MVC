<?php

    use App\core\Controller;
    use App\Auth;

    class Home extends Controller{


        public function index(){
            //echo "Estou no controller HOME e no método INDEX<br>";
            //$user = $this->model('User');
            //$user->nome = $nome;
            //$user->email = $email;

            $note = $this->model('Note');
            $dados = $note->getAll();

            $this->view('home/index', $dados = ['registros' => $dados]);
            //echo $user->nome.'<br>'.$user->email;
            //$this->view('home/index', ['nome' => $user->nome, 'email' => $user->email]);
        }


        
        public function buscar(){
            $busca = isset($_POST['search']) ? $busca = $_POST['search'] : $_SESSION['search'];
            $_SESSION['search'] = $busca;

            $note = $this->model('Note');
            $dados = $note->search($busca);

            $this->view('home/index', $dados = ['registros' => $dados]);
          
        }



        public function login(){

            $mensagem = array();

            if(isset($_POST['entrar'])){

                if((empty($_POST['email'])) || (empty($_POST['senha']))){
                    $mensagem[] = "O campo e-mail e senha são obrigatórios";
                }else{
                    $email = $_POST['email'];
                    $senha = $_POST['senha'];
                    $mensagem[] = Auth::Login($email, $senha);
                }
            }
            $this->view('home/login', $dados = ['mensagem' => $mensagem]);
        }



        public function logout(){
            Auth::logout();
        }


        public function teste(){
            echo "Estou no controller HOME e no método TESTE";
        }

    }
?>