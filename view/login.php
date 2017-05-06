<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title></title>
  
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>
  <link rel="stylesheet" href="view/css/login.css">
  <link rel="stylesheet" href="view/admin/css/bootstrap.css">

  
</head>

<body>
  <div class="login-wrap">
        <div class="login-html">
            
		<input id="tab-1" type="radio" name="tab" class="sign-in" 
                   <?php if(!isset($_POST['logaradmin'])) echo'checked'; else echo'';?>  >
                
                <label for="tab-1" class="tab">Precificador</label>
                
		<input id="tab-2" type="radio" name="tab" class="sign-up"
                     <?php if(isset($_POST['logaradmin'])) echo'checked'; else echo''; ?>>
                
                <label for="tab-2" class="tab">Administrador</label>
                
                 <div class="login-form">
		      
                          
			<div class="sign-in-htm">
                            <form method="post">
				<div class="group">
			            <label for="user" class="label">CPF</label>
				    <input id="user" type="text" class="input" name="cpf"
			            placeholder="CPF" onkeyup="mascara(this, mcpf);" maxlength="14" 
                                    value="<?php if(isset($_POST['cpf']))echo $_POST['cpf'];  ?>">
				</div>
                            
				<div class="group">
			            <label for="pass" class="label">Senha</label>
			            <input id="pass" type="password" class="input" data-type="password" 
                                    name="senha" placeholder="Senha" value="<?php if(isset($_POST['senha']))echo $_POST['senha'];  ?>">
				</div>
				
				<div class="group">
				    <input type="submit" class="button" name="logaratendente" value="Acessar">
				</div>
                                
				<div class="hr"></div>
				<div class="foot-lnk">
					<!--<a href="#forgot">Forgot Password?</a>-->
				</div>
				
		            </form>
                            <?php
                            if(isset($_POST['logaratendente']))
                            {
                             $atendente= new Atendente();
                             $atendente->logar(addslashes($_POST['cpf']), addslashes($_POST['senha']));
                            }
                            ?>
	                </div>
			
			<div class="sign-up-htm">
			
			    <form method="post">
		
				<div class="group">
					<label for="user" class="label">Login</label>
					<input id="user" type="text" class="input" name="login"
					placeholder="Login"  maxlength="100" 
                                        value="<?php if(isset($_POST['login']))echo $_POST['login'];  ?>">
				</div>
                                
				<div class="group">
					<label for="pass" class="label">Senha</label>
					<input id="pass" type="password" class="input" data-type="password" 
                                        name="senhaadmin" placeholder="Senha" 
                                        value="<?php if(isset($_POST['senhaadmin']))echo $_POST['senhaadmin'];  ?>"/>
				</div>
				
				<div class="group">
					<input type="submit" class="button" name="logaradmin" value="Acessar">
				</div>
                                
				<div class="hr"></div>
                                
				<div class="foot-lnk">
					<!--<a href="#forgot">Forgot Password?</a>-->
				</div>
				
			    </form>
				
                            <?php
                               if(isset($_POST['logaradmin']))
                               {
                                 $admin= new Admin();
                                 $admin->logar(addslashes($_POST['login']), 
                                               addslashes($_POST['senhaadmin']));
                               }
                            ?>
                        </div>
                     
                    </div>
        </div>
    </div>
     

</body>
</html>
