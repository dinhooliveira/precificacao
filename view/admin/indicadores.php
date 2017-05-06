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
                        <div class="panel panel-default">
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
                              <div class="row">
                                  
                                  <div class="col-lg-12" style="margin-top:2%; margin-bottom: 2%;">
                                    
                                   <a href="?pagina=indicadores-cadastro" class="btn btn-primary" aria-label="...">
                                      <span class="glyphicon glyphicon-plus"> Novo</span>
                                   </a>
                                      
                                  </div>
                                  <br>
                              </div><!-- /.row --> 
                              
                                <div class="table-responsive">
                                    <table class="table" id="tabela" >
                                        
                                        <thead>
                                          <th></th>
                                          <th>Nome</th>
                                          <th>CPF</th>
                                          <th>CRC</th>
                                          <th>Cargo</th>
                                          <th>E-mail</th>
                                          <th>Status</th>
                                          <th></th>
                                          
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            
                                           
                                           
                                            
                                            $result = $admin->get_indicador();
                                           
                                            while($dados = $result->fetch_assoc()):
                                                
                                                if($dados['status']==0)
                                                {
                                                  $status = 'Inativo';
                                                }
                                                  else
                                                {
                                                  $status = 'Ativo' ; 
                                                }
                                            ?>
                                            <tr>
                                               <form method="post"> 
                                                   
                          
                                                 <input type="hidden" class="form-control" name="codigo" value="<?=$dados['codigo']?>">
                                                   
                                                 <td><?=$dados['codigo'];?></td>
                                                 <td><?=$dados['nome'];?></td>
                                                 <td><?=$dados['cpf'];?></td>
                                                 <td><?=$dados['crc'];?> </td>
                                                 <td><?=$dados['cargo'];?></td>
                                                 <td><?=$dados['email'];?></td>  
                                                 <td><?=$status;?></td>  
                                                 <td>
                                                     <a href="?pagina=indicadores-alterar&codigo=<?=$dados['codigo'];?>" Class='btn btn-primary'>
                                                         <span class="glyphicon glyphicon-pencil"></span>
                                                     </a> 
                                                     <a href="?pagina=assinatura&id=<?=$dados['codigo'];?>" Class='btn btn-primary'>
                                                         <span class="glyphicon glyphicon-file"> Assinatura</span>
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

       
                   
            

