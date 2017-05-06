<div  Class="loginatendente" id="login_admin">
    <div id="Cabecalho_login">
        <p>Acesso Restrito</p>
    </div>
     <img src="view/img/CF-ISO.png">
    <form method="post">
       
<div class="row">
 <span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span>
 <input type="text" class="form-control" name="login" placeholder="Login"  value="<?php if(isset($_POST['login']))echo $_POST['login'];  ?>"></br>
    <span  class="glyphicon glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
    <input type="password" class="form-control" name="senha" placeholder="Senha" value="<?php if(isset($_POST['senha']))echo $_POST['senha'];  ?>"></br>
    <button type="submit" class='btn btn-default' id="botao" name="logaradmin" > <span class="glyphicon glyphicon glyphicon-send" aria-hidden="true"></span> <b>   Acessar</b></button>
</div>

    </form>
         <?php
 if(isset($_POST['logaradmin'])){
     $admin= new ClassAdmin();
     $admin->logar(addslashes($_POST['login']), addslashes($_POST['senha']));
 }
?>
</div>
</div>   