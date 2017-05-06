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
                                    if(isset($_POST['cadastrar']))
                                    $admin->cadastrar_indicador(
                                            $_POST['nome'],
                                            $_POST['cpf'], 
                                            $_POST['crc'], 
                                            $_POST['cargo'],
                                            $_POST['email'], 
                                            $_POST['senha']);
                                  ?>
                           <form method="post">
                                  <div class="col-lg-4">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control" aria-label="...">
                                  </div><!-- /.col-lg-4 -->
                                  
                                <div class="col-lg-4">
                                            <label>CPF</label>
                                            <input type="text" name="cpf" class="form-control" aria-label="...">
                                </div><!-- /.col-lg-4 -->
                                  
                                <div class="col-lg-4">
                                            <label>CRC</label>
                                            <input type="text" name="crc" class="form-control" aria-label="...">
                                </div><!-- /.col-lg-4 -->
                              </div><!-- /.row -->
                              
                              <div class="row">
                               <div class="col-lg-4">
                                            <label>Cargo</label>
                                            <input type="text" name="cargo" class="form-control" aria-label="...">
                                  </div><!-- /.col-lg-4 -->
                                  
                                <div class="col-lg-4">
                                            <label>E-mail</label>
                                            <input type="text" name="email" class="form-control" aria-label="...">
                                </div><!-- /.col-lg-4 -->
                                  
                                <div class="col-lg-4">
                                            <label>Senha</label>
                                            <input type="text" name="senha" class="form-control" aria-label="...">
                                </div><!-- /.col-lg-4 -->
                              </div><!-- /.row -->
                              
                              <div class="row">
                                  <div class="col-lg-12">
                                      <br>
                                  <button type="submit" name="cadastrar" class="btn btn-primary" aria-label="...">Cadastrar</button>
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
