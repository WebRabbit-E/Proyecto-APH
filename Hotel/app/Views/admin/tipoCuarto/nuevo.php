<?php 
	include_once('..\app\Views\templateAdmin\headerAdmin.php'); 
?>

            <div id="layoutSidenav_content">
            	<main>
                    <div class="container-fluid">
						<h1 class="mt-4">Tipo de Cuarto</h1>
						
                        <?php if($_POST){ foreach ($tipo as $el){?>
                                  
                        <ol class="breadcrumb mb-4">
	                        <li class="breadcrumb-item active">Cuartos Tipos de Cuarto/Nuevo</li>
	                    </ol>
                        <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Tipos de Cuarto</div>
                        <div class="card-body">

                        <form method="post" action="" enctype="multipart/form-data">
							<div class="row">
								<div class="col-3">	
									<div class="form-group">
										<label class="small mb-1" for="tipoCuarto">Tipo Cuarto</label>
										<input class="form-control py-4" id="tipoCuarto" name="tipoCuarto" type="text" value="<?php echo $el['']?>" required autocomplete="off"/>
									</div>
								</div>
								<div class="col-3">	
									<div class="form-group">
										<label class="small mb-1" for="precioCuarto">Precio</label>
										<input class="form-control py-4" id="precioCuarto" name="precioCuarto" type="text" value="<?php echo $el['']?>" required autocomplete="off"/>
									</div>
								</div>	
                            </div>
                            <input type="hidden" name="" value="<?=$el['']?>" > 
                            <input type="submit" name="guardar" class="btn btn-success"> 
                            <a href="" class="btn btn-danger">Cancelar</a>					
                        </form>
                    <?php };}else{?> 
                        <ol class="breadcrumb mb-4">
	                        <li class="breadcrumb-item active">Cuartos Tipos de Cuarto/Nuevo</li>
	                    </ol>
                        <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Tipos de Cuarto</div>
                        <div class="card-body">

                        <form method="post" action="guardar" enctype="multipart/form-data">
							<div class="row">
								<div class="col-3">	
									<div class="form-group">
										<label class="small mb-1" for="tipoCuarto">Nombre</label>
										<input class="form-control py-4" id="tipoCuarto" name="tipoCuarto" placeholder="Suite" type="text" required autocomplete="off"/>
									</div>
                                </div>
                                <div class="col-3">	
									<div class="form-group">
										<label class="small mb-1" for="precioCuarto">Precio</label>
										<input class="form-control py-4" id="precioCuarto" name="precioCuarto" placeholder="$ 000.00" type="number" required autocomplete="off"/>
									</div>
                                </div>
								<div class="col-5">	 
									<div class="form-group">
										<label class="small mb-2" for="imgUrl">Imagen del Cuarto</label>
										<input id="imgUrl" name="imgUrl" type="file" required/>
									</div>
								</div>
                            </div>
                            <div class="row">
                                <div class="col-10">	
                                    <div class="form-group">
										<label class="small mb-1" for="descripcion"> Descripción del Evento</label>
										<textarea class="form-control py-4" id="descripcion" name="descripcion" placeholder="Ingresa descripción del cuarto." required with="100px" height="100px"></textarea>
									</div>
								</div>
                            </div>
                             
                            <input type="submit" name="guardar" class="btn btn-success"> 
                            <a href="../TipoCuartoAdmin" class="btn btn-danger">Cancelar</a>					
                        </form>
                                <?php } ?>
                        </div>
                        </div>
                    </div>
				</main>
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php'); 
?>   			