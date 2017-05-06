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
                                <h3 class="panel-title"><i class="fa fa-money fa-fw">
                                </i>Cadastro de Indicadores</h3>
                            </div>
                            <div class="panel-body">
                                
                              
                              <div class="row">
                                  <?php
                                    $admin = new Admin();
                                    if(isset($_POST['status'])) 
                                        $status= 1;
                                    else 
                                        $status=0;
                                    
                                    if(isset($_GET['codigo']))
                                    $dados = $admin->get_indicador_($_GET['codigo']);
                                   
                                    if(isset($_POST['alterar']))
                                      $admin->alterar_indidicador(
                                            $_POST['codigo'],
                                            $_POST['nome'],
                                            $_POST['crc'], 
                                            $_POST['cargo'],
                                            $_POST['email'], 
                                            $_POST['senha'],
                                            $status); 
                                            
                                  ?>
                           <form method="post">
                               <input type="hidden" name="codigo" class="form-control" value="<?=$dados['codigo'];?>">
                                  <div class="col-lg-4">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control" value="<?=$dados['nome'];?>">
                                  </div><!-- /.col-lg-4 -->
                                  
                                  
                                <div class="col-lg-4">
                                            <label>CRC</label>
                                            <input type="text" name="crc" class="form-control" value="<?=$dados['crc'];?>">
                                </div><!-- /.col-lg-4 -->
                                
                                <div class="col-lg-4">
                                            <label>Cargo</label>
                                            <input type="text" name="cargo" class="form-control" value="<?=$dados['cargo'];?>">
                                  </div><!-- /.col-lg-4 -->
                                  
                              </div><!-- /.row -->
                              
                              <div class="row">
                               
                                  
                                <div class="col-lg-4">
                                            <label>E-mail</label>
                                            <input type="email" name="email" class="form-control" value="<?=$dados['email'];?>">
                                </div><!-- /.col-lg-4 -->
                                  
                                <div class="col-lg-4">
                                            <label>Senha</label>
                                            <input type="text" name="senha" class="form-control" value="<?=$dados['senha'];?>">
                                </div><!-- /.col-lg-4 -->
                        
                              
                                <div class="col-lg-1">
                                    <div class="form-group">
                                    <div class="checkbox">
                                        <br>
                                            <label>
                                            <input type="checkbox" name="status" <?php if($dados['status']==1) echo'checked';?> >Ativar
                                            </label>
                                            
                                    </div>
                                </div>
                                </div><!-- /.col-lg-4 -->
                                
                              </div><!-- /.row -->
                              
                              <div class="row">
                                  <div class="col-lg-12">
                                      <br>
                                  <button type="submit" name="alterar" class="btn btn-primary" aria-label="...">Atualizar</button>
                                  </div>
                              </div><!-- /.row -->
                            </div>
                    </form>  
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
