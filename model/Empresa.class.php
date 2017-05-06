<?php


class Empresa extends Conexao {
 
    
    
    
            function cadastrarempresa($cnpj,$nome,$atividade,$tributacao){
                
                $funcoes = new ClassFuncoes();
               //valida todos os dados passados por parametro
         if($cnpj==""){    
        
         echo "Campo CNPJ é Obrigátorio";
             
        }else if(strlen($cnpj)!=18){
            
            echo "CNPJ não está em formato correto";
            
        }else if($funcoes->validar_cnpj($cnpj)==false){
            echo "CNPJ inválido";
            
        }else if($nome==""){
            
            echo "Campo Nome é Obrigátorio";
            
        }else if($atividade==""){
            
            echo "Campo Tipo é Obrigátorio";
            
        }else if($tributacao==""){
              echo "Campo Data de abertura é Obrigátorio";
        }else{
            
            if(!isset($_SESSION))session_start();
            
            $sql="INSERT INTO empresa( cpfresponsavel, cnpj, nome, atividade, tributacao) VALUES ('".$_SESSION['cpfresponsavel']."','".$cnpj."','".$nome."','".$atividade."','".$tributacao."')";
            $result = $this->conexao->query($sql);
            
           
             
            if(!$result){
                
               if($this->conexao->errno==1062){
                 $sql=" UPDATE empresa SET nome='".$nome."', atividade='".$atividade."',tributacao='".$tributacao."' WHERE cpfresponsavel='".$_SESSION['cpfresponsavel']."' && cnpj='".$cnpj."'";
                 $result = $this->conexao->query($sql);
                 
                 if(!$result){
                     
                   echo $this->conexao->error;
                   
                 }else{
                     echo "alterado com sucesso";
                     // caso de alteração
                     $_SESSION['tributacao']="";
                     $_SESSION['atividade']="";
                     $_SESSION['CNPJ']=$cnpj;
                     $_SESSION['tributacao']=$tributacao;
                     $_SESSION['atividade']=$atividade;
                     
                     $calculo = new ClassCalculo();
                     $calculo->calcular($_SESSION['tributacao'],$_SESSION['atividade']);
                     
                     
                 }
               }
               
            }else{
                
                    echo "Cadastrado Com sucesso";
                     //caso de inclusao
                    
                     $_SESSION['tributacao']="";
                     $_SESSION['atividade']="";
                     $_SESSION['CNPJ']=$cnpj;
                     $_SESSION['tributacao']=$tributacao;
                     $_SESSION['atividade']=$atividade;
                     
                     $calculo = new ClassCalculo();
                     $calculo->calcular($_SESSION['tributacao'],$_SESSION['atividade']);
              
            }
        }
    }
    
            function salvarprecificacao($cpf_responsavel,$cpf_atendente,$cnpj,$qtd_produto,$qtd_funcionario,$custo_total,$preco_honorario,$preco_t_honorario){
                
                if(!is_numeric($qtd_produto) || !is_numeric($qtd_funcionario)){
                    
                 echo"<BR>Verifique se os campos [Quantidade de Produtos],[Quantidade de Funcionarios] está preenchido caso esteja OK tente novamente ";
                
              
                }else if (!is_numeric($custo_total)||!is_numeric($custo_total)|| !is_numeric($preco_honorario)|| !is_numeric($preco_t_honorario)){
                    echo "<br>Ocorreu algum erro tente novamente";
                    
                }else{
                    
                     $variacao = $preco_t_honorario-$preco_honorario;
                     $data = date("Y-m-d");  
                     //echo $cpf_atendente;
                     //echo $cpf_responsavel;
                     $funcao = new ClassFuncoes();
                     $codigos = $funcao->GerarCodigo($cnpj,$cpf_responsavel, $cpf_atendente,$data);
                     //echo $codigos;
                     
                       
                      //echo $data;
                      $sql = "INSERT INTO precificacao(cpf_responsavel, cpf_atendente, cnpj, qtd_produto, qtd_funcionario, custo_total, preco_honorario, preco_t_honorario, diferenca,data,codigos) VALUES ('".$cpf_responsavel."','".$cpf_atendente."','".$cnpj."',".$qtd_produto.",".$qtd_funcionario.",".$custo_total.",".$preco_honorario.",".$preco_t_honorario.",".$variacao.",'".$data."','".$codigos."')";
                      $result = $this->conexao->query($sql);
                      
                      
                      if(!$result){
                          
                         //echo $this->conexao->error;
                        
                          $sql = "UPDATE precificacao SET qtd_produto=".$qtd_produto.",qtd_funcionario=".$qtd_funcionario.",custo_total=".$custo_total.",preco_honorario=".$preco_honorario.",preco_t_honorario=".$preco_t_honorario.",diferenca=".$variacao.", codigos='".$codigos."' WHERE cpf_responsavel='".$cpf_responsavel."' AND cpf_atendente='".$cpf_atendente."' AND cnpj='".$cnpj."' AND data='".$data."'";
                          $result = $this->conexao->query($sql);
                          
                          if(!$result){
                          
                          //echo $this->conexao->error;
                        
                          }else{
                              $email = new ClassEmail();
                              $msg = "<html><body><a href='http://meuplanocf.com.br/?pagina=contrato&codigo=".$codigos."' target='blank'>Contrato</a></body><html>";
                              
                              $email->email($msg);
                             
                            echo "<script>location.href='?pagina=consultacontrato&codigo=".$codigos."';</script>";
                          }
                          
                      }else{
                           $email = new ClassEmail();
                           $msg = "<html><body><a href='http://meuplanocf.com.br/?pagina=contrato&codigo=".$codigos."' target='blank'>Contrato</a></body><html>";
                              
                              $email->email($msg);
                              
                        //echo"<br>Precificado com Sucesso";
                           echo "<script>location.href='?pagina=consultacontrato&codigo=".$codigos."';</script>";
                          
                          
                       
                      }
                      
                }
     
            }
            
            
            function contrato($codigo){
           
             
            $sql = " SELECT precificacao.codigo, empresa.nome,empresa.cnpj,responsavel.nome,responsavel.cargo,atendente.nome,atendente.cargo,precificacao.data,empresa.tributacao,precificacao.qtd_produto,precificacao.qtd_funcionario,precificacao.preco_t_honorario,atendente.assinatura FROM empresa,responsavel,atendente,precificacao WHERE precificacao.codigos=".$codigo." and precificacao.cpf_atendente = atendente.cpf and precificacao.cpf_responsavel=empresa.cpfresponsavel and precificacao.cnpj=empresa.cnpj and empresa.cpfresponsavel = responsavel.cpf";
            $result = $this->conexao->query($sql);
            
              if(!$result){
                //echo $this->conexao->error;
                header("location:?pagina=loginatendente");
               }else{
                $qtd= $result->num_rows;
                
                if($qtd<=0) header("location:?pagina=loginatendente");
                $dados = $result->fetch_array();
               
                $array = array("razao"=>$dados[1],"cnpj"=>$dados[2],"responsavel"=>$dados[3],"cargo_r"=>$dados[4],"atendente"=>$dados[5],"cargo_at"=>$dados[6],"data"=>$dados[7],"tributacao"=>$dados[8],"produto"=>$dados[9],"funcionario"=>$dados[10],"honorario"=>$dados[11],"assinatura"=>$dados[12]);
                return $array;
               }
          }
          
          
          
          function confirmacontrato($codigo) 
          {
                    $sql1= "SELECT aceito from precificacao where codigos='".$codigo."'";
                    
                   $result = $this->conexao->query($sql1);
                   if(!$result){
                   echo 'ocorreu um erro '.$this->conexao->error;
                   }else{
                   
                   $cont = $result->num_rows;
                   $dados = $result->fetch_assoc();
                   
                   if($cont==0){
                    
                    echo'Este código não foi encontrado verifique se foi feit alguma alteraçãi na url e tente novamente';
                   }else if($dado==1){
                   
                   echo 'contrato já foi aceito';
                   
                   }else{
                   
                   
                    
                    $IP = $_SERVER['REMOTE_ADDR']; // Salva o IP do visitante
                    $PAGINA = $_SERVER['PATH_INFO'];// Salva o IP do visitante
                    $HORA = date('Y-m-d H:i:s'); // Salva a data e hora atual (formato MySQL)
                    $NAVEGADOR = $_SERVER['HTTP_USER_AGENT'];
 
                     $aceitode = "IP - ". $IP." PAGINA - ".$PAGINA." NAVEGADOR - ".$NAVEGADOR." HORA - ". $HORA."";
                    
                   // Monta a query para inserir o log no sistema
                   $sql = "UPDATE  precificacao  set aceito = '1' , aceitacao = '".$aceitode."' where codigos='".$codigo."'";
                   
               if ($this->conexao->query($sql))
               
              return true;
                    else
              echo $sql."<br>";
              echo $this->conexao->error;
          }
          
          }
          }
}


