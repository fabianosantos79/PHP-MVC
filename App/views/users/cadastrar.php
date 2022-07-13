<div class="row container">
    <h1>Cadastrar Usuário</h1>

    <?php 
        if(!empty($data['mensagem'])){
            foreach($data['mensagem'] as $m){
                echo $m.'<hr>';
            }
        }
    ?>

    <form action="/users/cadastrar" method="POST">
        <div class="row">
            <div class="input-field col s12">
            <input id="nome" type="text" name="nome" class="validate">
            <label for="nome">Nome</label>
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s12">
            <input id="email" type="email" name="email" class="validate">
            <label for="email">E-mail</label>
            </div>
        </div>
      
        <div class="row">
            <div class="input-field col s12">
            <input id="senha" type="password" name="senha" class="validate">
            <label for="senha">Senha</label>
            </div>
        </div>

        <button name="cadastrar" type="submit" class="waves-effect waves-light btn blue">Cadastrar</button>
    </form>
</div>