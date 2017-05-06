<div class="total">
<div class="panel panel-info">
  <!-- Default panel contents -->
  <div class="panel-heading">Cadastro de Indicadores</div>
  
<form enctype="multipart/form-data" method="post">

      <div class='row'>
      
      <div class='col-md-2'>
        <div class='form-group'>
          <label>Nome</label>
          <input type="text" class='form-control' name="nome" placeholder="Nome" value="<?PHP if(isset($_POST['nome']))echo $_POST['nome']; ?>"/>
        </div>
      </div>
      
      <div class='col-md-2'>
        <div class='form-group'>
           <label>CPF</label>
           <input type="text" class='form-control' name="cpf"  placeholder="CPF" value="<?PHP if(isset($_POST['cpf'])) echo $_POST['cpf']; ?>"/>
       </div>
      </div>
      
      <div class='col-md-2'>
        <div class='form-group'>
           <label>CRC</label>
        <input type="text" class='form-control' name="crc"  placeholder="CRC" value="<?PHP if(isset($_POST['crc'])) echo $_POST['crc']; ?>"/>
       </div>
      </div>  
        
       <div class='col-md-2'>
        <div class='form-group'>
           <label>Cargo</label>
             <input type="text" class='form-control' name="cargo" placeholder="Cargo" value="<?PHP if(isset($_POST['cargo']))echo $_POST['cargo']; ?>"/>
       </div>
      </div> 
      
       <div class='col-md-2'>
        <div class='form-group'>
           <label>E-mail</label>
             <input type="text" class='form-control' name="email" placeholder="E-mail" value="<?PHP if(isset($_POST['email']))echo $_POST['email']; ?>"/>
       </div>
      </div> 
      
      <div class='col-md-2'>
        <div class='form-group'>
         <label>Senha</label>
        <input type="text" class='form-control' name="senha" placeholder="Senha" /><br>
      </div>
     </div> 
      
     <input Class='btn btn-success' type="submit" name="cadastraratendente" value="enviar">
        
        
   
      
       
      </div>
</form>
</div>


<?php
 $admin = new ClassAdmin();
if(isset($_POST['cadastraratendente'])){
   
    $admin->cadastraratendente($_POST['nome'], $_POST['cpf'], $_POST['crc'],$_POST['cargo'],$_POST['email'],$_POST['senha']);         
}

if(isset($_POST['alteraratendente'])){
     $admin->alterartendente($_POST['codigo'],$_POST['nome'],$_POST['crc'], $_POST['cargo'],$_POST['email'], $_POST['senha']);
}

if(isset($_POST['ativa_desativa'])){
    $admin->ativaratendente($_POST['codigo'], $_POST['status']);
}

$admin->listaratendente();
?>

</div>
</div>