<div id="page-wrapper">              
 <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->   
                
<div class="row">  
<div class="col-lg-12">
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-money fa-fw"></i>
                                     Lista de Indicadores
                                </h3>
                            </div>
                            <div class="panel-body">
                        <?php
                          $admin = new Admin();
                          
                          
                          
                        ?>
                             
      
                                <div class="table-responsive">
        <div class="col-md-12" style="margin-bottom: 2%;">
            <form method="post">
            
        <div class="col-lg-3">
        <b>Data Início</b>
        <input type="date" Class="form-control" name="datainicio" id="datainicio" required  value="<?php if(isset($_POST['datainicio']))echo $_POST['datainicio']; ?>"/>
        </div>
        
        <div class="col-lg-3">
        <b>Data Final</b>
        <input type="date" Class="form-control" name="datafim" id="datafim" required value="<?php if(isset($_POST['datafim']))echo $_POST['datafim']; ?>"/>
        </div>
         
        <div class="col-md-2">
            <br>
        <input type="submit" Class="btn btn-primary" name="consultar"  value="Consultar">
        </div>
            </form>
            
        </div>
                                    <table class="table" id="tabela" >
                                        
                                        
                                        <thead>
                                          <th>CPF Indicador</th>
                                          <th>Nome Indicador</th>
                                          <th>CPF Responsavel</th>
                                          <th>Nome Responsavel</th>
                                          <th>Empresa</th>
                                          <th>CNPJ</th>
                                          <th>Data</th>
                                          <th>Status</th>
                                          <th></th>
                                          
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            
                                            $datai='0000-00-00';
                                            $dataf = Date('Y-m-d');
                                            if(isset($_POST['consultar']))
                                            {
                                                
                                               $datai= $_POST['datainicio'];
                                               $dataf= $_POST['datafim'];
                                            }
                                            
                                               $result = $admin->get_consulta($datai,$dataf);
                                              
                                            //var_dump($result->fetch_assoc());
                                            while($dados = $result->fetch_assoc()):
                                                
                                                if($dados['aceito']==0)
                                                {
                                                  $status = 'Aguardando aceite';
                                                }
                                                  else
                                                {
                                                  $status = 'Aceito' ; 
                                                }
                                            ?>
                                            <tr>
                                               <form method="post"> 
                                                   
                          
                                                 <input type="hidden" class="form-control" name="codigo" value="<?=$dados['codigo']?>">
                                                   
                                                 <td><?=$dados['at_cpf'];?></td>
                                                 <td><?=$dados['atendente'];?></td>
                                                 <td><?=$dados['res_cpf'];?></td>
                                                 <td><?=$dados['responsavel'];?></td>
                                                 <td><?=$dados['nome'];?></td>
                                                 <td><?=$dados['cnpj'];?></td>
                                                 <td><?=$dados['data'];?> </td>
                                                 <td><?=$status;?></td>  
                                                 <td>
                                                     <a href="?pagina=consultacontrato&codigo=<?=$dados['codigos'];?>" target="_blank" Class='btn btn-warning'>
                                                         <span class="glyphicon glyphicon-eye-open"></span>
                                                     </a> 
                                                 </td>   
                                                 
                                                </form>
                                            </tr>
                                                 
                                           <?php endwhile;?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>       
                </div>
                <!-- /.row -->                                               
                                                 
                                                 
              </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->                           

       
