<br>
<?php 
    if(!empty($data['mensagem'])){
        foreach($data['mensagem'] as $m){
            echo $m.'<br>';
        }
    }
?>

<div class="row container">
    <h1>Fazer Login</h1>

    <form action="/home/login" method="POST">
        <div class="row">
            <div class="input-field col s12">
            <input id="email" type="email" name="email" class="validate">
            <label for="email">E-mail</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input id="password" type="password" name="senha" class="validate">
            <label for="password">Senha</label>
            </div>
        </div>
        <button class="waves-effect waves-light btn blue" name="entrar">Entrar</button>
    </form>
</div>