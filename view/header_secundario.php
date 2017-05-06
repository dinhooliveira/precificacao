<body  style=" background-image: url('view/img/pre-fundo.jpg');  
       background-repeat: no-repeat; 
       background-attachment: fixed; /* e agora a regra de ouro que fará a imagem ocupar todo o viewport */
       background-size: 100% 100%; ">
    <div Class="Dados_Atendente">
<?php 
if(!isset($_SESSION))session_start();
$atendente = new ClassAtendente();
$atendente->mostrardadosatendente();
?>
    </div>
<div class="header_principal">
    <img src="view/img/CF-ISO.png">
</div>
