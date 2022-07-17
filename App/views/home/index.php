<nav>
    <div class="nav-wrapper container">
      <form method="POST" action="/home/buscar">
        <div class="input-field">
          <input id="search" name="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>

<br>
<?php 
    if(!empty($data['mensagem'])){
        foreach($data['mensagem'] as $m){
            echo $m.'<br>';
        }
    }
?>

<div class="row container">

    <?php
        //Paginação
        $pagination = new App\Pagination($data['registros'], isset($_GET['page']) ? $_GET['page'] : 1, 4);
    ?>

    <?php
        //Nenhum registro 
        if(empty($pagination->resultado())){
            echo "Nenhum registro encontrado!";
        }
    ?>

    <?php foreach($pagination->resultado() as $note): ?>
        <h1><a href="/notes/ver/<?php echo $note['id']; ?>"><?php echo $note['id'] ?> - <?php echo $note['titulo'] ?></a></h1>
        <img src="<?php echo URL_BASE; ?>/uploads/<?php echo $note['imagem']; ?>" width="500" alt="imagem"/>
        <p><?php echo $note['nome'] ?></p>
        <p><?php echo $note['texto'] ?></p>

        <?php if(isset($_SESSION['logado'])): ?>

            <!-- Estrtura Modal Excluir -->
            <div id="confirmacao-excluir-<?php echo $note['id']; ?>" class="modal">
                <div class="modal-content">
                <h4>Excluir bloco</h4>
                <p>Tem certeza que deseja excluir o <strong><?php echo $note['titulo']; ?>?</strong></p>
                </div>
                <div class="modal-footer">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                
                <!-- Botão excluir -->
                <a href="/notes/excluir/<?php echo $note['id']; ?>" class="waves-effect waves-light btn red">Excluir</a>
                </div>
            </div>

            <a href="/notes/editar/<?php echo $note['id']; ?>" class="waves-effect waves-light btn orange">Editar</a>
                
            <!-- Abrir o modal excluir -->
            <a class="waves-effect waves-light btn modal-trigger red" href="#confirmacao-excluir-<?php echo $note['id']; ?>">Excluir</a>
        <?php endif; ?>

    <?php endforeach; ?>

    <?php 
        //Navegação
        $pagination->navigator();
    ?>
</div>
