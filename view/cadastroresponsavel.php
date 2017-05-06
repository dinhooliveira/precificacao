

<div class="total">
<div  Class="loginatendente">
<div Class="busca_responsavel">
    <form method="post">
    
   <div class="row">
    <div class="col-md-12">
    <input type="text"  class="form-control" name="cpf_consulta" required placeholder="CPF" onkeyup="mascara(this, mcpf);" maxlength="14"  value="<?php if(isset($_POST['cpf_consulta'])){echo $_POST['cpf_consulta'];}else if(isset($_POST['cpf'])){echo $_POST['cpf'];}?>">
    </div>
              <input type="submit" class="btn btn-default" id="botao" name="consultarresponsavel" value="Consultar">
   </div><!--row-->
         
    </form> 
    
    
 </div>
</div>
 


    


<?php

if(isset($_POST['consultarresponsavel'])){
    $atendente->consultarresponsavel($_POST['cpf_consulta']);
}

if(isset($_POST['cadastrarresponsavel'])){
    $atendente->cadastrarresponsavel($_POST['nome'], $_POST['cpf'], $_POST['cargo'], $_POST['celular'], $_POST['telefone'], $_POST['email']);
}

if(isset($_POST['alterarresponsavel'])){
    $atendente->alterarresponsavel($_POST['codigo'],$_POST['nome'], $_POST['cpf'], $_POST['cargo'], $_POST['celular'], $_POST['telefone'], $_POST['email']);
}
?>


</div>   

