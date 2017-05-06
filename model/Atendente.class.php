<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClassAtendente
 *
 * @author Oliveira
 */
class Atendente extends Conexao {
    

    
       
    function logar($cpf,$senha){
        $sql= "Select * from atendente where cpf ='".$cpf."'";
        $result= $this->conexao->query($sql);
        if(!$result){
            $this->conexao->error;
        }else{
            
            $linha= $result->num_rows;
            $dados = $result->fetch_assoc();
           
            if($linha==0){ //verifica se foi encontrado um registro de cpf caso contrario devolve um msg
                echo "<div class='alert alert-danger' role='alert'>CPF não está registrado em nosso sistema</div>"
               ;
                
            }else if($dados['senha']!=$senha){// verifica se a senha digital é igual ao registrado no banco
                    echo "<div class='alert alert-danger' role='alert'>Senha inválida</div>";
                    
                }else if($dados['status']==0){//verifica se usuario está ativo
                        echo "<div class='alert alert-danger' role='alert'>Você não pode efetuar um acesso pois está bloqueado pelo Administrador</div>";
                    }else{
                        
                        $this->iniciarsession($dados['codigo'], $dados['nome'], $dados['cpf'], $dados['cargo'],$dados['crc']);
                    
                        header("location:?pagina=cadastroresponsavel");
                    }
                }
                
    }
 
    function iniciarsession($codigo,$nome,$cpf,$cargo,$crc){
        session_start();
        $_SESSION["codigo"] = $codigo;
        $_SESSION["nome"] = $nome;
        $_SESSION["cpf"] = $cpf;
        $_SESSION["cargo"] = $cargo;
        $_SESSION["crc"] = $crc;
        $_SESSION['acesso']="login321";
    }
    
    function mostrardadosatendente(){
        //session_start();
        $dados = "<div class='dados_atendente'>"
        ."    <span class='glyphicon glyphicon-user'></span><label>".$_SESSION["nome"]."</label>"
        ."</div>";
        echo $dados;
    }
    
    function consultarresponsavel($cpf){
        
        $funcoes = new Funcoes();
        if($funcoes->validCPF($cpf)==false){
            $this->msg("Formato de CPF Inválido",'alerta');
        }else{
            
        
       $sql= "SELECT * FROM responsavel WHERE cpf ='".$cpf."'";
       $result= $this->conexao->query($sql);
       
       if(!$result){
            $this->conexao->error;
        }else{
            
            $linha= $result->num_rows;
            $dados = $result->fetch_assoc();
           
            if($linha==0){ //verifica se foi encontrado um registro de cpf caso contrario devolve um msg
                
                $this->msg("CPF não está registrado em nosso sistema! Efetue o cadastro", 'info');
                include('view/formcadastroresponsavel.php');
            }else{
                
                
                
                echo "<div  Class='loginatendente'><div class='formulario_responsavel'><form method='post'>"
                     ."<input type='hidden' id='text' name='codigo' value='".$dados['codigo']."'><br>"
                     ."<b>NOME</b><br><input type='text' id='text' name='nome' value='".$dados['nome']."'><br>"
                     ."<b>CPF</b><br><input type='text' id='text' name='cpf' readonly value='".$dados['cpf']."'><br>"
                     ."<b>CARGO</b><br><input type='text' id='text' name='cargo'  value='".$dados['cargo']."'><br>"
                     ."<b>CELULAR</b><br><input type='text' id='text' name='celular'  value='".$dados['celular']."'><br>"
                     ."<b>TELEFONE</b><br><input type='text' id='text'name='telefone'  value='".$dados['telefone']."'><br>"
                     ."<b>E-MAIL</b><br><input type='text' id='text'name='email'  value='".$dados['email']."'><br>"
                     ."<button type='submit' class='btn btn-default' Id='botao' name='alterarresponsavel'  > Continuar <span class='glyphicon glyphicon-arrow-right'></span></button></form></div></div><br>"
                        
                ;
                
                $this->msg("CPF  está registrado em nosso sistema! Efetue o atualização", 'info');        
                        
            }
        }
        
        }
    }
    
    function cadastrarresponsavel($nome,$cpf,$cargo,$celular,$telefone,$email){
        
        if($nome==""){
            echo "Nome é obrigátorio";
            include('view/formcadastroresponsavel.php');
        }else if($cpf==""){
            echo "CPF é obrigátorio";
            include('view/formcadastroresponsavel.php');
        }else if($cargo==""){
            include('view/formcadastroresponsavel.php');
            echo "cargo é obrigátorio";
        }else if($telefone=="" && $celular==""){
            include('view/formcadastroresponsavel.php');
            echo "É obrigátorio o telefone ou o celular";
        }else if($email==""){
            include('view/formcadastroresponsavel.php');
             echo "E-mail é obrigátorio";
        }else{
        $data = date('Y-m-d');
        $sql = "INSERT INTO responsavel (nome, cpf, cargo,celular,telefone,email,data_atualizacao) VALUES ('".$nome."','".$cpf."','".$cargo."','".$celular."','".$telefone."','".$email."','".$data."')";
        $result= $this->conexao->query($sql);
        
        if(!$result){
            include('view/cadastroresponsavel.php');
            $this->conexao->error;
            
        }else{
            if(!isset($_SESSION))session_start();
            
            $_SESSION['cpfresponsavel']= $cpf;
            $_SESSION['email']= $email;
             
            header('location:?pagina=cadastroempresa');
            echo "dados registrados com sucesso!";
        
        }
        
        }
    }
        
    function alterarresponsavel($codigo,$nome,$cpf,$cargo,$celular,$telefone,$email){
        
        if($nome==""){
            echo "Nome é obrigátorio";
            include('view/formcadastroresponsavel.php');
        }else if($cpf==""){
            echo "CPF é obrigátorio";
            include('view/formcadastroresponsavel.php');
        }else if($cargo==""){
            include('view/formcadastroresponsavel.php');
            echo "cargo é obrigátorio";
        }else if($telefone=="" && $celular==""){
            include('view/formcadastroresponsavel.php');
            echo "É obrigátorio o telefone ou o celular";
        }else if($email==""){
            include('view/formcadastroresponsavel.php');
             echo "E-mail é obrigátorio";
        }else{
        $data = date('Y-m-d');
        $sql = "UPDATE responsavel SET nome='".$nome."',cpf='".$cpf."',cargo='".$cargo."',celular='".$celular."',telefone='".$telefone."',email='".$email."',data_atualizacao='".$data."' WHERE codigo='".$codigo."'";
        $result= $this->conexao->query($sql);
        
        if(!$result){
            include('view/formcadastroresponsavel.php');
            echo $this->conexao->error;
            
        }else{
            
            if(!isset($_SESSION))session_start();
            
            $_SESSION['cpfresponsavel']=$cpf;
            $_SESSION['email']=$email;
            
            header('location:?pagina=cadastroempresa');
            echo "dados registrados com sucesso!";
        
        }
        
        }
    }
    
    function msg($msg,$tipo){
        if($tipo=='alerta') echo "<div class='alert alert-danger' role='alert'>".$msg."</div>" ;
        if($tipo=='info') echo "<div class='alert alert-info' role='alert'>".$msg."</div>";
    }
    
    function seguranca(){
        
        if(!isset($_SESSION)) session_start();
        
        if(!isset($_SESSION['acesso']) || $_SESSION['acesso']!="login321") {
            header('location:?pagina=loginatendente');
              exit;
        }
        
        
    }
    
    function sair(){
        session_start();
        session_destroy();
        
        if(!isset($_GET['codigo'])) header("location:?pagina=loginatendente");
        }
}
