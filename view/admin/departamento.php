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
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw">
                                </i>Departamentos</h3>
                            </div>
                            <div class="panel-body">
                        <?php
                          $admin = new Admin();
                          if(isset($_POST['alterarhonorario']))
                             $admin->alterarhonorario($_POST['codigo'],$_POST['valor']);
                          
                        ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        
                                        <thead>
                                          <th>Váriaveis</th>
                                          <th>Valores Qtd/Perc </th>
                                          <th></th>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $soma=0;
                                            $result = $admin->get_Hononarios();
                                            while($dados = $result->fetch_assoc()):
                                            ?>
                                            <tr>
                                               <form method="post"> 
                                                   
                          
                                                 <input type="hidden" class="form-control" name="codigo" value="<?=$dados['codigo']?>">
                                                   
                                                 <td>
                                                    <?= utf8_encode($dados['departamento']);?>
                                                 </td>
                                                 
                                                 <td>
                                                     <input type="text" class="form-control" name="valor"  value="<?=$dados['valor']?>">
                                                 </td>
                                                 
                                                 <td>
                                                     <button type='submit'  Class='btn btn-primary' name='alterarhonorario'>
                                                         <span class="glyphicon glyphicon-pencil"></span>
                                                     </button>  
                                                  
                                                 </td>
                                               </form>
                                            </tr>
                                                                                        

                                           <?php  
                                               $soma+=$dados['valor'];
                                               endwhile;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?="<h3>".'R$ '.number_format($soma , 2, ',', '.')."</h3>";?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw">
                                </i>Váriaves de Cálculo</h3>
                            </div>
                            <div class="panel-body">
                        <?php
                          $admin = new Admin();
                          if(isset($_POST['alterarescopo']))
                           $admin->alterarescopo($_POST['codigo'],$_POST['valor']);
                        ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        
                                        <thead>
                                          <th>Váriaveis</th>
                                          <th>Valores Qtd/Perc </th>
                                          <th></th>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            
                                            $result = $admin->get_escopo();
                                            while($dados = $result->fetch_assoc()):
                                            ?>
                                            <tr>
                                               <form method="post"> 
                                                   
                          
                                                 <input type="hidden" class="form-control" name="codigo" value="<?=$dados['codigo']?>">
                                                   
                                                 <td>
                                                    <?= utf8_encode($dados['descricao']);?>
                                                 </td>
                                                 
                                                 <td>
                                                     <input type="text" class="form-control" name="valor"  value="<?=$dados['valor']?>">
                                                 </td>
                                                 
                                                 <td>
                                                     <button type='submit'  Class='btn btn-primary' name='alterarescopo'>
                                                         <span class="glyphicon glyphicon-pencil"></span>
                                                     </button>  
                                                  
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


