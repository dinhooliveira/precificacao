<body onload="consulta_hb_data()">
   
   
   <div class='total'>
    <div class="panel panel-primary">
     <!-- Default panel contents -->
     <div class="panel-heading"><h3>Gerar consulta de contratos</h3></div>
        <div class="panel-body">
  
    <form id="formulario" method="post" >
        <div class="row">
        
        <div class="col-md-12">
        <input type="hidden"  name="hb" id="hb" value="<?php if(isset($_POST['hb'])) echo $_POST['hb']; ?>" /><br>
       
        <label>CPF Indicador</label>
        <input type="radio" name="tipo" value="cpf_atendente" <?php if(!isset($_POST['tipo']) || $_POST['tipo']=="cpf_atendente") echo "checked" ?> />
       
        
       / <label>Nome do Indicador</label>
         <input type="radio" name="tipo" value="atendente" <?php if(isset($_POST['tipo']) && $_POST['tipo']=="atendente") echo "checked" ?> />
         
        
       / <label>CPF Responsável</label>
        <input type="radio" name="tipo" value="cpf_responsavel" <?php if(isset($_POST['tipo']) && $_POST['tipo']=="cpf_responsavel") echo "checked" ?>/>
       
       / <label>Responsável</label>
         <input type="radio" name="tipo" value="responsavel" <?php if(isset($_POST['tipo']) && $_POST['tipo']=="responsavel") echo "checked" ?>/>


      /  <label>CNPJ</label>
         <input type="radio" name="tipo" value="cnpj" <?php if(isset($_POST['tipo']) && $_POST['tipo']=="cnpj") echo "checked" ?>/>
    
       / <label>Empresa</label>
         <input type="radio" name="tipo" value="empresa" <?php if(isset($_POST['tipo']) && $_POST['tipo']=="empresa") echo "checked" ?>/>
        
        
        <input type="text" Class="form-control" name="consulta" onblur="consulta_dados()" value="<?php if(isset($_POST['consulta']))echo $_POST['consulta']; ?>"><br>
        <input type="submit" Class="btn btn-primary" name="enviar" value="Consultar"/><br>
        </div><!--col-md-12-->
        
        
        </div><!--row-->
        
        
    
        
        <div class="row">
        
        <div class="col-md-2">
        <br><b>Habilitar Período</b><input type="checkbox" name="hbdata" id="hbdata" onclick="consulta_hb_data()" <?php if(isset($_POST['hb'])) echo $_POST['hb']; ?>/>
        </div>
        
        <div class="col-md-2">
 
        <b>Data Início</b><input type="date" Class="form-control" name="datainicio" id="datainicio"  value="<?php if(isset($_POST['datainicio']))echo $_POST['datainicio']; ?>"/>
        </div>
        
        <div class="col-md-2">
        <b>Data Final</b><input type="date" Class="form-control" name="datafim" id="datafim" value="<?php if(isset($_POST['datafim']))echo $_POST['datafim']; ?>"/>
        </div>
        
         <div class="col-md-2">
        <b>  Classificar por:</b>
        Crescente<input type="radio" name="ordem" value="ASC" <?php if(!isset($_POST['ordem']) || $_POST['ordem']=="ASC") echo "checked" ?> />
<br>
        Decrescente<input type="radio" name="ordem" value="DESC" <?php if(isset($_POST['ordem']) && $_POST['ordem']=="DESC") echo "checked" ?> />
        </div>
        
        
       
        </div><!--row-->
    </form> 
    
    </div>
    </div>
    </div>
     <hr width="100%">
       
        
        
        
        <?php
        $consulta = new Admin();
       
        if(isset($_POST['consulta'])){
            
            if(!isset($_POST['datainicio']) && !isset($_POST['datafim'])){
                $datai = "00-00-0000";
                $dataf = "00-00-0000";
            }else{
                $datai = $_POST['datainicio'];
                $dataf = $_POST['datafim'];
            }
           $consulta->consulta($_POST['consulta'],$_POST['tipo'],$datai,$dataf,$_POST['ordem']);
        }
        ?>
   </div>
</body>