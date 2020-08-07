<?php 
	include_once('..\app\Views\templateAdmin\headerAdmin.php'); 
?>

            <div id="layoutSidenav_content">
            	<main>
                    <div class="container-fluid">
						<h1 class="mt-4">Preguntas Frecuentes</h1>
						
						<?php if($_POST){ foreach ($faq as $el){?>

	                        <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Administración/Sitio Web/Preguntas Frecuentes/Nuevo</li>
							</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Preguntas</div>
                            <div class="card-body">
                                
								<form role="form" method="post" action="actualizar" enctype="multipart/form-data">
									<div class="row">
										<div class="col-10">	
											<div class="form-group">
										 		<label class="small mb-1" for="pregunta">Pregunta</label>
										 		<textarea class="form-control py-4" id="pregunta" name="pregunta" required with="100px" height="100px"><?php echo $el['pregunta']?></textarea>
											 </div>
										</div>
									</div>
									<div class="row">
										<div class="col-10">	
											<div class="form-group">
												 <label class="small mb-1" for="respuesta">Respuesta</label>
												 <textarea class="form-control py-4" id="respuesta" name="respuesta" required with="100px" height="100px" ><?php echo $el['respuesta']?></textarea>
										 	</div>
										</div>
									</div> 
									<input type="hidden" name="idFaq" value="<?=$el['idFaq']?>">
								<input type="submit" name="guardar" class="btn btn-success"> 
								<a href="../Faqsadmin" class="btn btn-danger">Cancelar</a>	
								</form>
						<?php };}else{?>    
							
							<ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Administración/Sitio Web/Preguntas Frecuentes/Nuevo</li>
							</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Preguntas</div>
                            <div class="card-body">
                                
								<form role="form" method="post" action="guardar" enctype="multipart/form-data">
									<div class="row">
										<div class="col-10">	
											<div class="form-group">
										 		<label class="small mb-1" for="pregunta">Pregunta</label>
										 		<textarea class="form-control py-4" id="pregunta" name="pregunta" required with="100px" height="100px"></textarea>
											 </div>
										</div>
									</div>
									<div class="row">
										<div class="col-10">	
											<div class="form-group">
												 <label class="small mb-1" for="respuesta">Respuesta</label>
												 <textarea class="form-control py-4" id="respuesta" name="respuesta" required with="100px" height="100px"></textarea>
										 	</div>
										</div>
									</div> 
								<input type="submit" name="guardar" class="btn btn-success"> 
								<a href="../Faqsadmin" class="btn btn-danger">Cancelar</a>	
								</form>
							<?php } ?>
                            </div>
                        </div>
                    </div>
				</main>
			
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php'); 
?>         
