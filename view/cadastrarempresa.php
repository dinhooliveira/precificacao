 
<div class="total">
    <div  Class="empresa">
<div Class="formulario_responsavel">
         <form method="post">
             <b>CNPJ</b><br> <input type='text' id='text' onblur="meu_callbackCNPJ(this.value)"  name='cnpj' required onkeyup="mascara(this,mcnpj);" maxlength="18" value="<?php if(isset($_POST['cnpj']))echo $_POST['cnpj'];?>"><br>
             <b>Nome</b><br><input type='text' id='text'  name='nome' required value="<?php if(isset($_POST['nome']))echo $_POST['nome'];?>" ><br>
          
             <b>Atividade</b><br> <select name='atividade' id="text" required>
              <?php 
              if(isset($_POST['atividade'])){
               if($_POST['atividade']=='comercio') echo  "<option value='comercio'>Comércio</option>";
               if($_POST['atividade']=='industria') echo  "<option value='industria'>Indústria</option>";
               if($_POST['atividade']=='servico') echo   "<option value='servico'>Serviço</option>";
              } 
              ?>
              
          <option value='comercio'>Comércio</option>
          <option value='industria'>Indústria</option>
          <option value='servico'>Serviço</option>
          </select>
        
             <br><br><b>Tributação</b><br><select name='tributacao' id="text" required>
               <?php 
              if(isset($_POST['tributacao'])){
               if($_POST['tributacao']=='real') echo  "<option value='real'>Lucro Real</option>";
               if($_POST['tributacao']=='presumido') echo  "<option value='presumido'>Lucro Presumido</option>";
               if($_POST['tributacao']=='simples') echo   " <option value='simples'>Simples Nacional</option>";
              } 
              ?>
          <option value='real'>Lucro Real</option>
          <option value='presumido'>Lucro Presumido</option>
          <option value='simples'>Simples Nacional</option>
             </select> <br><br>
          <button type="submit" name="cadastrar_empresa" class="btn btn-default" id="botao" >Continuar <span class="glyphicon glyphicon-arrow-right"></span> </button>
         </form>
          </div>

    <?php
    
          

    
     $empresa= new ClassEmpresa();
     
     if(isset($_POST['cadastrar_empresa'])){
         
         $empresa->cadastrarempresa($_POST['cnpj'], $_POST['nome'], $_POST['atividade'], $_POST['tributacao']);
     }
    
     
    ?>
 
 </div>
</div>