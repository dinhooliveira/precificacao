<div class="total">
    
 
 

    <div  Class="loginatendente" id="login_atendendente">     
<div class="logoatendente">
<img src="view/img/CF-ISO.png">
</div><!--logoatendente-->

      <div   id="frase_efeito">
    <p>&ldquo;Sua empresa precisa estar no melhor escritório contábil!!<br> 
        Faça parte da nossa seleção!&rdquo;</p>
      </div><!--frase_efeito-->

    <div id="Cabecalho_login">
        <b>Bem vindo à precificação</b>
    </div><!--cabecalho_login-->
   
    <form method="post">
        
    <div class='row'>
    
    <input type="text" class="form-control" name="cpf" placeholder="CPF" onkeyup="mascara(this, mcpf);" maxlength="14" value="<?php if(isset($_POST['cpf']))echo $_POST['cpf'];  ?>"><br>
    <input type="password" class="form-control" name="senha" placeholder="Senha" value="<?php if(isset($_POST['senha']))echo $_POST['senha'];  ?>"><br>
    <input type="submit" class="btn btn-primary" id="botao" name="logaratendente" value="Acessar">
    <a id="link_acesso" href="?pagina=loginadmin">Acesso restrito<a/>
    
    </div><!--row-->
    
    
    </form>
    
    
         <?php
 if(isset($_POST['logaratendente'])){
     $atendente= new ClassAtendente();
     $atendente->logar(addslashes($_POST['cpf']), addslashes($_POST['senha']));
     
 }
?>



</div>
</div>




 

  
