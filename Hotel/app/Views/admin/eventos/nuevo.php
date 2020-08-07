<?php 
	include_once('..\app\Views\templateAdmin\headerAdmin.php'); 
?>

            <div id="layoutSidenav_content">
            	<main>
                    <div class="container-fluid">
						<h1 class="mt-4">Eventos</h1>
						
						<?php if($_POST){ foreach ($eve as $el){?>

						 <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Administración/Sitio Web/Eventos/Editar</li>
							</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para editar Eventos</div>
                            <div class="card-body">

							<form role="form" method="post" action="" enctype="multipart/form-data">
									<div class="row">
										<div class="col-5">	
											<div class="form-group">
										 		<label class="small mb-1" for="nombreEvento">Nombre del Evento</label>
										 		<input class="form-control py-4" id="nombreEvento" name="nombreEvento" type="text" value="<?php echo $el['nombreEvento']?>" required autocomplete="off"/>
											 </div>
										</div>
										<div class="col-5">	 
											 <div class="form-group">
												 <label class="small mb-2" for="imagenEvento">Imagen del Evento</label>
										 		<input id="imagenEvento" name="imagenEvento" type="file"/>
										 	</div>
										</div>
									</div>
									<div class="row">
										<div class="col-10">	
											<div class="form-group">
												 <label class="small mb-1" for="descripcion"> Descripción del Evento</label>
												 <textarea class="form-control py-4" id="descripcion" name="descripcion" required with="100px" height="100px"><?php echo $el['descEvento']?></textarea>
										 	</div>
										</div>
									</div> 
								<input type="submit" name="guardar" class="btn btn-success"> 
								<a href="../Admineventos" class="btn btn-danger">Cancelar</a>	
							</form>	

						<?php };}else{?> 

						<ol class="breadcrumb mb-4">
	                        <li class="breadcrumb-item active">Administración/Sitio Web/Eventos/Nuevo</li>
						</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Eventos</div>
                            <div class="card-body">
								<form role="form" method="post" action="guardar" enctype="multipart/form-data">
										<div class="row">
											<div class="col-5">	
												<div class="form-group">
													<label class="small mb-1" for="nombreEvento">Nombre del Evento</label>
													<input class="form-control py-4" id="nombreEvento" name="nombreEvento" type="text" placeholder="Nombre del evento" required autocomplete="off" />
												</div>
											</div>
											<div class="col-5">	 
												<div class="form-group">
													<label class="small mb-2" for="imagenEvento">Imagen del Evento</label>
													<input id="imagenEvento" name="imagenEvento" type="file" required/>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-10">	
												<div class="form-group">
													<label class="small mb-1" for="descripcion"> Descripción del Evento</label>
													<textarea class="form-control py-4" id="descripcion" name="descripcion" placeholder="Ingresa descripción del evento." required with="100px" height="100px"></textarea>
												</div>
											</div>
										</div> 
									<input type="submit" name="guardar" class="btn btn-success"> 
									<a href="../Admineventos" class="btn btn-danger">Cancelar</a>	
								</form>
						<?php } ?>
                            </div>
                        </div>
                    </div>
				</main>
			
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php'); 
?>         
