
<div class="formulario_responsavel">
<form method="post">

    <b>NOME</b><br><input type="text" id='text'  name="nome" placeholder="nome" required="" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'];?>"><br>
    <b>CPF</b><br><input type="text" id='text'  name="cpf" placeholder="CPF"  readonly required value="<?php if(isset($_POST['cpf_consulta'])){echo $_POST['cpf_consulta'];}else if(isset($_POST['cpf'])){echo $_POST['cpf'];}?>"><br>
<b>CARGO</b><br><input type="text" id='text'  name="cargo" placeholder="cargo" required value="<?php if(isset($_POST['cargo'])) echo $_POST['cargo'];?>"><br>
<b>CELULAR</b><br><input type="text" id='text'  name="celular" placeholder="celular" value="<?php if(isset($_POST['celular'])) echo $_POST['celular'];?>"><br>
<b>TELEFONE</b><br><input type="text" id='text'  name="telefone" placeholder="telefone" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone'];?>"><br>
<b>E-MAIL</b><br><input type="text" id='text'   name="email" placeholder="email" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><br>
<button type="submit" name="cadastrarresponsavel" class="btn btn-default" id="botao" >Continuar <span class="glyphicon glyphicon-arrow-right"></span> </button>
</form>
    </div>
