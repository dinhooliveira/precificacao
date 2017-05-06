<div class="row">  
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
    <div class="col-lg-12">
                        <div class="panel panel-default" >
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-money fa-fw"></i>
                                     Anexar Aquivo de imagem
                                </h3>
                            </div>
       <div class="panel-body">
        <div class="upload">
                <form method='post' enctype='multipart/form-data'><br>
                <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
		<input type='file'class="form-control" name='foto' value='Cadastrar foto'>
                   <br>
		<input type='submit' class="btn btn-primary" name='submit'>
	       </form>
	<?php			
		
					
			if ((isset($_POST["submit"])) && (! empty($_FILES['foto']))){
				$upload = new Upload();
				$upload->construtor($_FILES['foto'], 1000, 800, "uploads/",$_POST['id']);
			
			}
		?>
		
        </div>
        </div>
                        </div>
    </di>
</div>
 </div>
</div>
    
                            