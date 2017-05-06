<?php

class Conexao {

private $servidor="localhost";
private $usuario="root";
private $senha="";
private $banco="precificacao";
public $conexao;

/*private $usuario="publishe_p";
private $senha="publisher";
private $banco="publishe_precificacao";
public $conexao;*/

function __construct(){
 $this->conexao = mysqli_connect($this->servidor,$this->usuario,$this->senha,$this->banco)or die (mysqli_error());
}


}