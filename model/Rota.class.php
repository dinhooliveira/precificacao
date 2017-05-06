<?php


class Rota {
    
 
function rota(){
    
    
   if(isset($_GET["pagina"])){
      $pagina= $_GET["pagina"];
   }else{
      $pagina= "loginatendente";
   }
   
   $seguranca=  new Atendente();
   $segurancaAdm= new Admin();
   
   switch($pagina){
    //paginas referentes a precificação
        case "loginatendente": 
            include_once('view/login.php'); 
        break;
        
        case "cadastroresponsavel":
            $seguranca->seguranca();
            include_once('view/header_secundario.php'); 
            include_once('view/cadastroresponsavel.php');
            include_once('view/footer.php');
         break;
     
     case "precificador":
         $seguranca->seguranca();
         include('view/header_secundario.php'); 
         include('view/precificador.php');
         include('view/footer.php');
       break;
     
         case "cadastroempresa":
             include('view/header_secundario.php'); 
             $seguranca->seguranca();
            include('view/cadastrarempresa.php');
            include('view/footer.php');
          break;
        
        case "contrato":
           $seguranca->sair();
          include('view/contrato.php');
        break;
      
          case "consultacontrato":
          include_once('view/contrato.php');
        break;
    //paginas referentes ao administrador
      
       case "loginadmin": 
           include('view/login.php'); 
        break;
    
    
        case "menuadmin":
           $segurancaAdm->seguranca();
           include_once('view/admin/header.php');
           include_once('view/admin/menu.php');
           include_once('view/admin/menuadmin.php');
           include_once('view/admin/footer.php');
        break;
    
        case "departamento":
          $segurancaAdm->seguranca();
          include_once('view/admin/header.php');
          include_once('view/admin/menu.php');
          include_once('view/admin/departamento.php');
          include_once('view/admin/footer.php');
        break;
       
        case "consulta":
          $segurancaAdm->seguranca();
          include_once('view/admin/header.php');
          include_once('view/admin/menu.php');
          include_once('view/admin/consultacontrato.php');
          include_once('view/admin/footer.php');
        break;
    
        case "indicadores":
          $segurancaAdm->seguranca();
          include_once('view/admin/header.php');
          include_once('view/admin/menu.php');
          include_once('view/admin/indicadores.php');
          include_once('view/admin/footer.php');
        break;
        
        case "indicadores-cadastro":
          $segurancaAdm->seguranca();
          include_once('view/admin/header.php');
          include_once('view/admin/menu.php');
          include_once('view/admin/indicadores_cadastro.php');
          include_once('view/admin/footer.php');
        break;
    
        case "indicadores-alterar":
          $segurancaAdm->seguranca();
          include_once('view/admin/header.php');
          include_once('view/admin/menu.php');
          include_once('view/admin/indicadores_alterar.php');
          include_once('view/admin/footer.php');
        break;
    
        case "assinatura":
          include_once('view/admin/header.php');
          include_once('view/admin/menu.php');
          include_once('view/admin/assinatura_upload.php'); 
        break;
        
         
    
       default:
            include('view/login.php'); 
       break; 
   
           

         
   }
}

}

?>

