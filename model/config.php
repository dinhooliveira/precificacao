<?php

function __autoload($classname)
{
    require $classname . '.class.php';
}
?>