<?php


class Admin extends Conexao{
    
        
    
    //login do usuario usando como parametro login e senha
    function logar($login,$senha){
        
       $funcoes = new Funcoes();
        
        $sql= "Select * from admin where login ='".$login."'";
        $result= $this->conexao->query($sql);
        if(!$result){
          echo $funcoes->msg('erro',$this->conexao->error);
        }else{
            
            $linha= $result->num_rows;
            $dados = $result->fetch_assoc();
           
            if($linha==0){ //verifica se foi encontrado um registro de cpf caso contrario devolve um msg
                  
               echo $funcoes->msg('erro','Login não está registrado em nosso sistema');
                
                
            }else if($dados['senha']!=$senha){// verifica se a senha digital é igual ao registrado no banco
     
                    echo $funcoes->msg('erro','Senha inválida');
                }else{
                        
                        $this->iniciarsession($dados['codigo'], $dados['nome']);
                    
                        header("location:?pagina=menuadmin");
                    }
                }
                
    }
    
    function iniciarsession($codigo,$nome){
         
        session_start();
        $_SESSION["codigo"] = $codigo;
        $_SESSION["nome"] = $nome;
        $_SESSION['acesso']="admin321";
    }
 
     function seguranca(){
        
        if(!isset($_SESSION)) session_start();
        
        if(!isset($_SESSION['acesso']) || $_SESSION['acesso']!="admin321") {
            header('location:?pagina=loginadmin');
              exit;
        }
        
        
    }
    
    function sair(){
        session_start();
        session_destroy();
        
        if(!isset($_GET['codigo'])) header("location:?pagina=loginatendente");
        }
 //lista os dados da tabela honorario_departamento em um formulario com botão de alterar-------------------------------------------------------------------
    
    function get_Hononarios(){
      
      $sql= "Select * from honorario_departamento";
      $result= $this->conexao->query($sql) or die(mysqli_erro());
      return $result;
      
    }
    
    //altera os dados pegando como paramentros as informações à baixo-------------------------------------------------------------------------------------
    function alterarhonorario($codigo,$valor){
          $funcoes = new Funcoes();
        if(($codigo!="") && ($valor!="")){  
               $sql = "UPDATE honorario_departamento SET valor='".$valor."' WHERE codigo= ".$codigo."";
               
               $result= $this->conexao->query($sql) or die(mysqli_erro());
            if($result){
                $this->alterarcustos();
                
               echo $funcoes->msg('ok','Alterado com sucesso');
            }else{
               echo  $funcoes->msg('erro','Ocorreu um erro não foi possivel finaliza a alteração');
            }
           
        }else{
            echo $funcoes->msg('erro','Faltam dados para alteração');
             
        }
    }
    
    //inclui um novo departamento e novos valores--------------------------------------------------------------------------------------------------------
    function incluirhonorario($departamento,$valor){
        
        $funcoes = new Funcoes();
        
        if(($departamento!="") && ($valor!="")){
               
               
           $sql = "INSERT INTO honorario_departamento (departamento, valor) VALUES ('".$departamento."','".$valor."')";
           $result= $this->conexao->query($sql) or die(mysqli_erro());
               if($result){

                 echo $funcoes->msg('ok', 'Incluido com sucesso');
          
                  }else{
                      
                  echo $funcoes->msg('erro', 'Ocorreu um erro não foi possivel finaliza a alteração');
                }
      
            }else{
                
                 echo $funcoes->msg('warn', 'faltam dados para inclusão');
               
                }
              echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=?pagina=honorariodp'>";
        }
        
        //inclui um novo departamento e novos valores----------------------------------------------------------------------------------------------------
    function Excluir($codigo){
        
        $funcoes = new Funcoes();
        
        if($codigo!=""){
               
               
           $sql = "DELETE FROM honorario_departamento WHERE codigo='".$codigo."'";
           $result= $this->conexao->query($sql) or die(mysqli_erro());
               if($result){
                  
                   echo $funcoes->msg('ok', 'Excluido com sucesso');
          
                  }else{
                    echo $funcoes->msg('ok', 'Ocorreu um erro não foi possivel finaliza a Exclusão'); 
                }
      
            }else{
                 echo $funcoes->msg('warn', 'Faltam dados para Exclusão');
               
                }
            
        }
        
        
        
        //escopo ------------------------------------------------------------------------------------------------------------------------------------------
        function get_escopo()
        {
           $sql= "Select * from escopo";
           $result= $this->conexao->query($sql) or die(mysqli_erro());
           return $result;
        }
    
    
     //altera os dados do escopo pegando como paramentros as informações à baixo-------------------------------------------------------------------------------------
    function alterarescopo($codigo,$valor){
        
            $funcoes = new Funcoes();
            
        if(($codigo!="") && ($valor!="")){  
               $sql = "UPDATE escopo SET valor='".$valor."' WHERE codigo= ".$codigo."";
               
               $result= $this->conexao->query($sql) or die(mysqli_erro());
            if($result){
               
                $this->alterarcustos();
                //echo "Alterado com sucesso";
                echo $funcoes->msg('ok', 'Alterado com sucesso');
            }else{
                
                echo $funcoes->msg('erro', 'Ocorreu um erro não foi possivel finaliza a alteração');
            }
           
        }else{
            
            echo $funcoes->msg('ok', 'Faltam dados para alteração');
        }
    }
    
    //alterar dados tabela custos
    
    function alterarcustos(){
      $sql= "select sum(valor) from honorario_departamento where codigo != 4 and codigo !=5 and codigo !=7 and codigo !=16 ";
      $result= $this->conexao->query($sql) or die(mysqli_erro());
      $operacional= $result->fetch_array();
      
      $sql= "select valor,codigo from honorario_departamento where codigo = 4 or codigo = 5 or codigo = 7 or codigo = 16 ";
      $result= $this->conexao->query($sql) or die(mysqli_erro());
      
      foreach ($result as $dados) {
          if($dados['codigo']==4)$valorfiscal = $dados['valor'];
          if($dados['codigo']==5)$valorligalizacao = $dados['valor'];
          if($dados['codigo']==7)$valorcontabil = $dados['valor'];
          if($dados['codigo']==16)$valorpessoal = $dados['valor'];
      }
      
      $sql= "select * from  escopo ";
      $result= $this->conexao->query($sql) or die(mysqli_erro());
      
      $qtd_cliente=0;
       foreach ($result as $dados) {
           
          if($dados['codigo']==1){
          $qtd_cliente = $qtd_cliente + $dados['valor'];
          $qtd_cliente_lr_lp = $dados['valor'];
          }
          
          if($dados['codigo']==2){
              $qtd_cliente = $qtd_cliente + $dados['valor'];
              $qtd_cliente_simples = $dados['valor'];
          }
          if($dados['codigo']==3)$qtd_funcinario = $dados['valor'];
      }
      //var_dump($result);
      //echo $qtd_cliente." - qtd cliente <br>";
      //echo $qtd_funcinario." - qtd funcionario <br>";
      //echo $valorfiscal." - fiscal<br>";
      //echo $valorligalizacao." - legalizacao<br>";
      //echo $valorcontabil." - contabil<br>";
     // echo $valorpessoal." - pessoal<br>";
      //echo $operacional[0]." - operacional<br>";//resultado da soma dos valores exceto 4-fiscal,5-legalização,7-contabil e 16-pessoal
      
     $custo_op_cli= $operacional[0]/$qtd_cliente;
      //echo"<BR>";
     $custo_cont_cli= $valorcontabil/ $qtd_cliente_lr_lp;
      //echo"<BR>";
     $custo_fiscal_cli_simples = ($valorfiscal/2)/$qtd_cliente_simples;
      //echo"<BR>";
     $custo_fiscal_cli_lr_lp = ($valorfiscal/2)/$qtd_cliente_lr_lp;
      //echo"<BR>";
     $custo_dp_cli_func = $valorpessoal/$qtd_funcinario;
      
      $sql= "UPDATE custo_total SET operacional='".$custo_op_cli."', contabil ='".$custo_cont_cli."', fiscal_simples='".$custo_fiscal_cli_simples."', fiscal_lr_lp='".$custo_fiscal_cli_lr_lp."', dp_funcionario ='".$custo_dp_cli_func."' WHERE codigo=6 ";
      $result= $this->conexao->query($sql) or die(mysqli_error());
     
    }
    
    
    function cadastrar_indicador($nome,$cpf,$crc,$cargo,$email,$senha){
      
        $funcoes = new Funcoes();
        
      if($nome==""){
         echo $funcoes->msg('warn', 'Nome é Obrigatorio');
      }else if($cpf==""){
         echo $funcoes->msg('warn', 'CPF é Obrigatorio');
      }else if($cargo==""){
         echo $funcoes->msg('warn', 'Cargo é Obrigatorio');
      }else if($senha==""){
         echo $funcoes->msg('warn', 'Senha é Obrigatoria');
      }else{
          
      $sql= "INSERT INTO atendente(nome,cpf,crc,cargo,email,senha) VALUES ('".$nome."','".$cpf."','".$crc."','".$cargo."','".$email."','".$senha."')";
      $result= $this->conexao->query($sql);
      
      if(!$result){
         if($this->conexao->errno==1062){
             echo $funcoes->msg('warn', 'CPF já possui cadastro');
         }
      }
      
      }
    }
    
    function get_indicador()
    {
      $sql= "Select * from atendente";
      $result= $this->conexao->query($sql) or die(mysqli_erro());
      return $result;

    }
    
      function get_indicador_($id=0)
    {
      $sql= "Select * from atendente WHERE codigo=".$id."";
      $result= $this->conexao->query($sql) or die(mysqli_erro());
      return $result->fetch_assoc();
    }
    
     function alterar_indidicador($codigo,$nome,$crc,$cargo,$email,$senha,$status){
         
         $funcoes = new Funcoes();
         if($nome==""){
             echo $funcoes->msg('warn', 'Nome é Obrigatorio');
         }else if($cargo==""){
             echo $funcoes->msg('warn', 'Cargo é Obrigatorio');
         }else if($senha==""){
             echo $funcoes->msg('warn', 'Senha é Obrigatoria');
         }
             
      $sql= "UPDATE atendente SET nome='".$nome."', crc='".$crc."',cargo='".$cargo."',email='".$email."',senha='".$senha."',status=".$status." WHERE codigo=".$codigo."";
      $result= $this->conexao->query($sql);
       if(!$result){
           echo $this->conexao->error;
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=?pagina=indicadores-alterar&codigo={$codigo}'>";
       }else{
           echo $funcoes->msg('ok','Alterado com sucesso!');
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=?pagina=indicadores-alterar&codigo={$codigo}'>";
       }
       
      //var_dump($result);
     
 
        }
        
        function ativaratendente($codigo,$status){
        
            if($status==0){
                $status=1;
            }else{
                $status=0;
            }
             
      $sql= "UPDATE atendente SET status='".$status."' WHERE codigo=".$codigo."";
      $result= $this->conexao->query($sql);
       if(!$result){
           $this->conexao->errno;
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=?pagina=atendente'>";
       }else{
           
            if($status==0){
             echo $this->funcoes->msg('warn', 'Desativado Com sucesso!');

            }else{
               echo $this->funcoes->msg('warn', 'Ativado Com sucesso!!');
            }
            echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=?pagina=atendente'>";
       }
       
      //var_dump($result);
     
 
        }
      
        
        function consulta($informacao,$tipo,$datai,$dataf,$ordem){
           
            if($tipo=='cpf_atendente')$campo = "precificacao.".$tipo;
            if($tipo=='atendente')$campo = "atendente.nome";
            if($tipo=='cpf_responsavel')$campo = "precificacao.".$tipo;
            if($tipo=='responsavel')$campo = "responsavel.nome";
            if($tipo=='cnpj')$campo = $campo = "precificacao.".$tipo;
            if($tipo=='empresa')$campo = $campo = "empresa.nome";
            
            $SQL = "SELECT atendente.cpf,atendente.nome,responsavel.cpf,responsavel.nome,empresa.cnpj,empresa.nome,precificacao.data ,precificacao.codigos,precificacao.aceito  FROM atendente,responsavel,empresa,precificacao WHERE ".$campo." LIKE '".$informacao."%' and precificacao.cpf_atendente = atendente.cpf and precificacao.cpf_responsavel=empresa.cpfresponsavel and precificacao.cnpj=empresa.cnpj and empresa.cpfresponsavel = responsavel.cpf ";
            
            if($datai!="00-00-0000" && $dataf!="00-00-0000"){
                $funcao = new ClassFuncoes();
                $datai= $funcao->TratarData($datai);
                $dataf= $funcao->TratarData($dataf); 
             $SQL = $SQL." and precificacao.data BETWEEN '".$datai."' and '".$dataf."' order by precificacao.data ".$ordem.";";
            }
            
        
            //ECHO "<br>".$SQL;
            
            
            
             
              $result = $this->conexao->query($SQL);
            
              if(!$result){
               echo $this->conexao->error;
               }else{
                $qtd= $result->num_rows;
                
                if($qtd<=0){
                    
                    echo $this->funcoes->msg('info', "Não foi encontrada Nenhuma Informação");
                    exit;
                }
                while($dados = $result->fetch_array()){
                
                
                    $resultado = "<div class='list-group'><ul>
                    <li class='list-group-item active'>Empresa: ".$dados[5]."</li>";
                    
                    $resultado = $resultado."<li class='list-group-item '><b>CNPJ :</b>".
                    $dados[4]."</li>".
                    
                    "<li class='list-group-item '><b>CPF Atendente :</b>".
                    $dados[0]."</li>".
        
                    "<li class='list-group-item '><b>Atendente : </b>".
                      $dados[1]."</li>".
        
                    "<li class='list-group-item '><b>CPF Responsavel : </b>".
                      $dados[2]."</li>".
        
                    "<li class='list-group-item '><b>Responsavel :</b>".
                      $dados[3]."</li>".
                   
                    
        
         
                    "<li class='list-group-item '><b>Data Registro :</b>".
                    $dados[6]."</li>";
                    
                   $resultado = $resultado."<li class='list-group-item '>";
                   if($dados[7]!=null){
                    $resultado = $resultado."<a href='?pagina=consultacontrato&codigo=".$dados[7]."' target='blank'>Ver Contrato</a>";
                   }else{
                     $resultado= $resultado."Ainda não gerou contrato";
                   }
                   
                  if($dados[8]==0){
                  
                  $resultado = $resultado."  |  <b>status : </b> <b style='color:red;'>Contrato ainda não foi aceito</b>";
                  
                  }else{
                  
                  $resultado = $resultado."  | <b>status : </b> <b style='color:green;'>Contrato foi aceito</b>";
 
                  }
                   
                   $resultado =  $resultado."</li>";
                   
                    $resultado= $resultado."</ul></div>";
                     $resultado= $resultado."<hr width='100%'>";
         echo $resultado;
                  
                  
                }
               }
        }
        
        function get_consulta($datai="00-00-0000",$dataf="00-00-0000")
        {
            $sql = "SELECT atendente.cpf as at_cpf,atendente.nome as atendente,responsavel.cpf as res_cpf,responsavel.nome as responsavel,empresa.cnpj,empresa.nome,precificacao.data ,precificacao.codigos,precificacao.aceito  FROM atendente,responsavel,empresa,precificacao WHERE  precificacao.cpf_atendente = atendente.cpf and precificacao.cpf_responsavel=empresa.cpfresponsavel and precificacao.cnpj=empresa.cnpj and empresa.cpfresponsavel = responsavel.cpf ";
            
             if($datai!="00-00-0000" && $dataf!="00-00-0000")
             {
                $funcao = new Funcoes();
                $datai= $funcao->TratarData($datai);
                $dataf= $funcao->TratarData($dataf); 
                $sql = $sql." and precificacao.data BETWEEN '".$datai."' and '".$dataf."';";
            }
            
            if($result = $this->conexao->query($sql))
            {
                return $result;
            }
              else 
            {
                  echo $this->conexao->error;
            }
        }
        
        function get_qtd_Contrato_Aceito()
        {
            $sql = "SELECT sum(aceito) FROM precificacao ";
            if($result = $this->conexao->query($sql))
            {
                
                $dados=$result->fetch_assoc();
                return $dados["sum(aceito)"];
            }
             else
             {
                 return false;
             }
        }
        
        function get_qtd_Contratos_Pendentes()
        {
            $sql = "SELECT count(aceito) FROM `precificacao` WHERE aceito=0";
            
            if($result = $this->conexao->query($sql))
            {
                
                $dados=$result->fetch_assoc();
                return $dados["count(aceito)"];
            }
             else
             {
                 return false;
             }
        }
        
        function get_qtd_Atendente_ativo()
        {
            $sql = "SELECT count(status) FROM atendente WHERE status =1";
            
            if($result = $this->conexao->query($sql))
            {
                
                $dados=$result->fetch_assoc();
                return $dados["count(status)"];
            }
             else
             {
                 return false;
             }
        }
        
          function get_qtd_Atendente_inativo()
        {
            $sql = "SELECT count(status) FROM atendente WHERE status =0";
            
            if($result = $this->conexao->query($sql))
            {
                
                $dados=$result->fetch_assoc();
                return $dados["count(status)"];
            }
             else
             {
                 return false;
             }
        }
}


