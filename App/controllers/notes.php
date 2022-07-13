<?php

    use App\core\Controller;
    use App\Auth;

    class Notes extends Controller{

        public function ver($id =''){
            
            $note = $this->model('Note');
            $dados = $note->findId($id);

            $this->view('note/ver', $dados = ['registros' => $dados]);
          
        }



        public function criar(){
            $mensagem =array();

            Auth::checkLogin();

            if(isset($_POST['cadastrar'])){
                
                $note = $this->model('Note');
                $note->titulo = $_POST['titulo'];
                $note->texto = $_POST['texto'];

                $mensagem[] = $note->save();

            }

            $this->view('note/criar', $dados =['mensagem'=> $mensagem]);
        }



        public function editar($id){
            $mensagem = array();
            Auth::checkLogin();
            $note = $this->model('Note');

            if(isset($_POST['atualizar'])){
                $note->titulo = $_POST['titulo'];
                $note->texto = $_POST['texto'];
                $mensagem[] = $note->update($id);
            }
            
            $dados = $note->findId($id);

            $this->view('note/editar', $dados = ['mensagem' => $mensagem, 'registros' => $dados]);

        }



        public function excluir($id = ''){
            Auth::checkLogin();
            
            $mensagem = array();
            
            $note = $this->model('Note');
            $mensagem[] = $note->delete($id);

            $dados = $note->getAll();

            $this->view('home/index', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
        }

    }
?>