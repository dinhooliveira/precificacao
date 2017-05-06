<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClassCalculo
 *
 * @author CfConbilidade_
 */
class Calculo extends Conexao{
   
     public $operacional;
     public $contabil;
     public $fiscal_simples; 
     public $fiscal_lr_lp; 
     public $dp_funcionario; 
     
     public $tri_s;
     public $tri_lp;
     public $tri_lr;
     
     public $at_comercio;
     public $at_industria;
     public $at_servico;
     public $produto;
     public $mlucro;
     
    function estruturar(){
        
     $sql = "SELECT * FROM custo_total ";
     
   $result= $this->conexao->query($sql);
      
     if(!$result){
         
      echo $this->conexao->error;
      
     }else{
         
         $dados = $result->fetch_assoc();
      
            $this->operacional=$dados['operacional'];
            $this->contabil=$dados['contabil'];
            $this->fiscal_simples=$dados['fiscal_simples'];
            $this->fiscal_lr_lp=$dados['fiscal_lr_lp'];
            $this->dp_funcionario=$dados['dp_funcionario'];
            
         
     }
     
     
     $sql = "SELECT * FROM escopo";
     $result =  $this->conexao->query($sql);
   
     if(!$result){
      echo $this->conexao->error;
      
     }else{
         
         
          
     while($dados = $result->fetch_assoc()){
       
            // echo $dados['codigo'];
            if($dados['codigo']==8)$this->mlucro=$dados['valor'];
            if($dados['codigo']==9)$this->tri_s=$dados['valor'];
            if($dados['codigo']==10)$this->tri_lr=$dados['valor'];
            if($dados['codigo']==11)$this->tri_lp=$dados['valor'];
            if($dados['codigo']==12)$this->at_comercio=$dados['valor'];
            if($dados['codigo']==13)$this->at_servico=$dados['valor'];
            if($dados['codigo']==14)$this->at_industria=$dados['valor'];
            if($dados['codigo']==15)$this->produto=$dados['valor'];
         }
            
            
         
     }
   }
   
   function calcular($tributacao,$atividade){
       
       $this->estruturar();
       
        if(!isset($_SESSION))session_start();
       
       if($tributacao=='presumido'){
           $resultadotri = $this->presumido();
           $resultadoati = $this->atividade($atividade,$resultadotri);
           //echo $resultadotri."<br>";
          // echo $resultadoati."<br>";
          
       }
       
        if($tributacao=='real'){
           $resultadotri = $this->real();
           $resultadoati = $this->atividade($atividade,$resultadotri);
          // echo $resultadotri."<br>";
           //echo $resultadoati."<br>";
           
       }
       
        if($tributacao=='simples'){
           $resultado = $this->simples();
           $resultadotri = $this->simples();
           $resultadoati = $this->atividade($atividade,$resultadotri);
          // echo $resultadotri."<br>";
           //echo $resultadoati."<br>";
       }
       $_SESSION['mlucro']=$this->mlucro;
       $_SESSION['produto']=$this->produto;
       $_SESSION['valor_base']=$resultadoati;
       $_SESSION['dp_funcionario']=$this->dp_funcionario;
       echo $_SESSION['valor_base'];
       header('location:?pagina=precificador');
       
       
   }
   
   function presumido(){
       $resultado = ($this->operacional + $this->contabil + $this->fiscal_lr_lp)* ($this->tri_lp/100);
       
       return $resultado;
   }
   
   function real(){
       $resultado = ($this->operacional + $this->contabil + $this->fiscal_lr_lp)*($this->tri_lr/100);
       
       return $resultado;
   }
   
   function simples(){
       $resultado = ($this->operacional + $this->fiscal_simples);
       
       return $resultado;
   }
   
   function atividade($atividade,$resultado){
       echo $atividade;
       
       if($atividade=='comercio')$resultado=($resultado*($this->at_comercio/100));
       if($atividade=='servico')$resultado=($resultado*($this->at_servico/100));
       if($atividade=='industria')$resultado=($resultado*($this->at_industria/100));
       
       return $resultado;
       
   }
}
