<body onload="carregar();">
    
    

    
  <div class="total">
    <div class="empresa">
<input type="hidden" id="base" value="<?php echo $_SESSION['valor_base']; ?>">
<input type="hidden" id="funcionario" value="<?php echo $_SESSION['dp_funcionario']; ?>">
<input type="hidden" id="produto" value="<?php echo $_SESSION['produto']; ?>">
<input type="hidden" id="mlucro" value="<?php echo $_SESSION['mlucro']; ?>">


<BR>

<div class="formulario_responsavel">
    <h1 onload="calculo();">Precificação</h1>
<form method="post">
    <br>
    <b>Quantidade de produtos</b><br><input type="text"   id="qtd_produto" name="qtd_produto" onkeyup="calculo();" onkeydown="mascara(this,mnum);" value="<?php if(isset($_POST['qtd_produto']))echo $_POST['qtd_produto'];?>" >
    <br><b>Quantidade de funcionário</b><Br><input type="text" id="qtd_funcionario" name="qtd_funcionario" onkeyup="calculo();" onkeydown="mascara(this,mnum);" value="<?php if(isset($_POST['qtd_funcionario']))echo $_POST['qtd_funcionario'];?>"><BR>
  
    <b>percentual(%)</b><input type="radio"  name="variacao" id="percentual" value="percentual" <?php if(isset($_POST['variacao']) && $_POST['variacao']!="monetario" || !isset($_POST['variacao'])  )echo "checked"?>  onclick="testevariacao();">
    <b>monetário(R$)</b><input type="radio" name="variacao" id="monetario" value="monetario" <?php if(isset($_POST['variacao']) && $_POST['variacao']=="monetario")echo "checked"?>   onclick="testevariacao();"><br><Br>
   
  
   
    
   <b>percentual</b><br><select name="taxa_variacao" id="taxa_variacao" onchange="calculo();">
        <?PHP if(isset($_POST["taxa_variacao"])) echo "<option value='".$_POST['taxa_variacao']."'>".$_POST['taxa_variacao']."</option>"; ?>
        <option value="0">0</option>
        <?php for($i=-50;$i<=400;$i++){
            
             echo "<option value='{$i}'>{$i}</option>";
            
            
        } ?>
    
     
   </select> 
     
   <br><br><b>Monetário</b><br> <input type="text" name="taxa_monetario" id="taxa_monetario" value="<?php if(isset($_POST['taxa_monetario']))echo $_POST['taxa_monetario'];?>" onkeyup="calculo();">
    <input type="hidden" id="custo_total" name="custo_total" value=""><!--custo total<br>-->
    <input type="hidden" id="precohonorario" name="preco_honorario" value=""><!--horario<br>-->
    <input type="hidden" id="precothonorario" name="preco_t_honorario" value=""><!--horario<br>-->
    <br><br><button type="submit" Class="btn btn-default" id="botao" name="gerar_contrato" >Gerar contrato<span class="glyphicon glyphicon-paste" ></span> </button>
    
    <?php
      if(isset($_POST['gerar_contrato'])){
          
          $precificar = new ClassEmpresa();
          $precificar->salvarprecificacao($_SESSION['cpfresponsavel'], $_SESSION["cpf"],$_SESSION['CNPJ'], $_POST['qtd_produto'], $_POST['qtd_funcionario'], $_POST['custo_total'], $_POST['preco_honorario'], $_POST['preco_t_honorario']);
      }
    ?>
</form>
    
    <div id="resultado"></div>
</div>
    </div>
  </div>
</body>
