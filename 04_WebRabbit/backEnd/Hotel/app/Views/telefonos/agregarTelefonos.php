<?php if (isset($persona)){

	$nombre=$persona[0]['nombre'];
	$apellido1=$persona[0]['apellido1'];
	$apellido2=$persona[0]['apellido2'];
	$pass=$persona[0]['pass'];
	$privilegios=$persona[0]['privilegios'];



		}else{

	$nombre='';
	$apellido1='';
	$apellido2='';
	$pass='';
	$privilegios='';

				} ?>

	<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Personas</h1>
	                        <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Clientes/Guardar</li>
	                        </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1">	
								<div class="row">	
	                            	<div class="col-11">
	                            		</i>Formulario para Clientes
	                        		</div>   	
	                           		<a href="/hotel" class="btn btn-danger">Cancelar</a>
	                            </div>	
	                        </div>
                            <div class="card-body">

									<?php 
										echo form_open('home/agregar');
									 ?>
									<div class="row">
										<div class="col-3">	
											<div class="form-group">
										 		<?php echo form_input(array('name'=>'nombre','placeholder'=>'Nombre','class'=>'form-control py-4','value'=>$nombre));
										 		echo '<br>';?>
										 		<br>
										 	</div>
										</div>
										<div class="col-3">	
											<div class="form-group">
										 		<?php echo form_input(array('name'=>'apellido1','placeholder'=>'Primer apellido','class'=>'form-control py-4','value'=>$apellido1)); 
										 		echo '<br>'; ?>
										 		<br>	
										 	</div>
										</div>
										<div class="col-3">	
											<div class="form-group">
										 		<?php echo form_input(array('name'=>'apellido2','placeholder'=>'Segundo apellido','class'=>'form-control py-4','value'=>$apellido2)); ?>
										 		<br>
										 	</div>
										</div>
 									</div>
 									<div class="row">
 										<div class="col-3">
	 										<div class="form-group">
												<?php  echo form_input(array('name'=>'pass','placeholder'=>'Password','class'=>'form-control py-4','type'=>'password','value'=>$pass)); ?>	
												<br>
											</div>
										</div>	
										<div class="col-3">	
											<div class="form-group">
													<?php

													 echo form_input(array('name'=>'privilegios','placeholder'=>'Privilegios','class'=>'form-control py-4','value'=>$privilegios)); 
													 	

													 	if (isset($persona)){

													 		echo form_hidden('idPersona',$persona[0]['idPersona']);

														 }
													 ?>


											</div>
										</div>	
									</div>
									
										<div class="col-11">	
										</div>

										<?php echo form_submit('guardar','guardar','class="btn btn-success"'); ?>

								<?php 	

								echo form_close();

 							?>
                            </div>
                        </div>
                    </div>
                </main>



	



