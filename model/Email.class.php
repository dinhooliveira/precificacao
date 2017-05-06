<?php
    
   class  Email{
   
   
   function email($message){
        
        session_start();
        
        
        
        $to = $_SESSION["email"];
        $subject = "Proposta";
        
       $msg ="Para visualizar seu contrato clique no link <br>";
       $msg.= $message;

          // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <contato@meuplanocf.com.br>' . "\r\n";
        $headers .= 'Cc: backup@publisherdigital.com.br' . "\r\n";
        
        

       $f="-f";
       $returnpath = "oliveira@publisherdigital.com.br";

             $result =  mail($to, $subject, $msg, $headers);
       
  
  
       if(!$result){
       
         echo "Falha ao enviar";
         
         }else{
        
         echo "<script>alert('Resultado Foi Enviado para seu ".$_SESSION["email"]." com sucesso! ATENÇÃO CASO NÃO TENHA RECEBIDO, VERIFICAR LIXO ELETRONICO');</script>";
         
         
        }
    
       }
  
  }

?>