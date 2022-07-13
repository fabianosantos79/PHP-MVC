<div class="row container">
    <h1>Editar Bloco de Anotação</h1>

    <?php 
        if(!empty($data['mensagem'])){
            foreach($data['mensagem'] as $m){
                echo $m.'<hr>';
            }
        }
    ?>

    <form action="/notes/editar/<?php echo $data['registros']['id']; ?>" method="POST">
        <div class="row">
            <div class="input-field col s12">
                <input id="titulo" type="text" name="titulo" class="validate" value="<?php echo $data['registros']['titulo'];?>">
                <label for="titulo">Título</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <textarea id="textarea1" name="texto" class="materialize-textarea" cols="30" rows="10"><?php echo $data['registros']['texto']; ?></textarea>
            <label for="textarea1">Texto</label>
            </div>
        </div>
        <button name="atualizar" type="submit" class="waves-effect waves-light btn blue">Atualizar</button>
    </form>
</div>