<div class="row container">
    <h1>Criar Bloco de Anotação</h1>

    <?php 
        if(!empty($data['mensagem'])){
            foreach($data['mensagem'] as $m){
                echo $m.'<hr>';
            }
        }
    ?>

    <form action="/notes/criar" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="input-field col s12">
                <input id="titulo" type="text" name="titulo" class="validate">
                <label for="titulo">Título</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" name="texto" class="materialize-textarea"></textarea>
            <label for="textarea1">Texto</label>
            </div>
        </div>

        <div class="file-field input-field">
            <div class="btn">
                <span>Arquivo</span>
                 <input type="file" name="foo">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text"  placeholder="Selecione o arquivo .png">
            </div>
         </div>

        <button name="cadastrar" type="submit" class="waves-effect waves-light btn blue">Cadastrar</button>
    </form>
</div>