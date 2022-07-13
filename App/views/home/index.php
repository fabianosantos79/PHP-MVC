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
        <p><?php echo $note['texto'] ?></p>

        <?php if(isset($_SESSION['logado'])): ?>
            <a href="/notes/editar/<?php echo $note['id']; ?>" class="waves-effect waves-light btn orange">Editar</a>
            <a href="/notes/excluir/<?php echo $note['id']; ?>" class="waves-effect waves-light btn red">Excluir</a>
        <?php endif; ?>

    <?php endforeach; ?>

    <?php 
        //Navegação
        $pagination->navigator();
    ?>
</div>
