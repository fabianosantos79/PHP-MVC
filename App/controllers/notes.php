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
                
                //UPLOAD de ARQUIVOS
                $storage = new \Upload\Storage\FileSystem('uploads');
                $file = new \Upload\File('foo', $storage);
                
                // Optionally you can rename the file on upload
                $new_filename = uniqid();
                $file->setName($new_filename);
                
                // Validate file upload
                // MimeType List => http://www.iana.org/assignments/media-types/media-types.xhtml
                $file->addValidations(array(
                    // Ensure file is of type "image/png"
                    new \Upload\Validation\Mimetype('image/png'),
                
                    //You can also add multi mimetype validation
                    //new \Upload\Validation\Mimetype(array('image/png', 'image/gif'))
                
                    // Ensure file is no larger than 5M (use "B", "K", M", or "G")
                    new \Upload\Validation\Size('5M')
                ));
                
                // Access data about the file that has been uploaded
                $data = array(
                    'name'       => $file->getNameWithExtension(),
                    'extension'  => $file->getExtension(),
                    'mime'       => $file->getMimetype(),
                    'size'       => $file->getSize(),
                    'md5'        => $file->getMd5(),
                    'dimensions' => $file->getDimensions()
                );
                
                // Try to upload file
                try {
                    // Success!
                    $file->upload();
                    
                    $note = $this->model('Note');
                    $note->titulo = $_POST['titulo'];
                    $note->texto = $_POST['texto'];
                    $note->imagem = $data['name'];

                    $mensagem[] = $note->save();
                    $mensagem[] = "<script>M.toast({html: 'Upload realizado com sucesso!'})</script>";
    
                } catch (\Exception $e) {
                    // Fail!
                    $errors = $file->getErrors();
                    $mensagem[] = implode("<br>", $errors);
                }
                //FIM DO UPLOAD DE ARQUIVOS
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