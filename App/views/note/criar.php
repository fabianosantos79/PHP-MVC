<div class="row container">
    <h1>Criar Bloco de Anotação</h1>

    <?php 
        if(!empty($data['mensagem'])){
            foreach($data['mensagem'] as $m){
                echo $m.'<hr>';
            }
        }
    ?>

    <form action="/notes/criar" method="POST">
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
        <button name="cadastrar" type="submit" class="waves-effect waves-light btn blue">Cadastrar</button>
    </form>
</div>