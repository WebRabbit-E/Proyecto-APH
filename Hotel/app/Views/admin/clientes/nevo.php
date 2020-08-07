<?php 
	include_once('..\app\Views\templateAdmin\headerAdmin.php'); 
?>

            <div id="layoutSidenav_content">
            	<main>
                    <div class="container-fluid">
						<h1 class="mt-4">Clientes</h1>
						
						<?php if($_POST){ foreach ($client as $el){?>

	                        <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Reservación/Clientes/Editar</li>
							</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para reserv</div>
                            <div class="card-body">
                                
                            <form method="post" action="actualizar" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="nombre">Nombre del Recepcionista</label>
                                            <input class="form-control py-4" id="nombre" name="nombre" type="text" value="<?php echo $el['nombre']?>" required autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="apellido1">Apellido Paterno</label>
                                            <input class="form-control py-4" id="apellido1" name="apellido1" type="text" value="<?php echo $el['apellido1']?>" required  autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="apellido2">Apellido Materno</label>
                                            <input class="form-control py-4" id="apellido2" name="apellido2" type="text" value="<?php echo $el['apellido2']?>" required  autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="numTelefono">Teléfono</label>
                                            <input class="form-control py-4" id="numTelefono" name="numTelefono" type="text" value="<?php echo $el['numTelefono']?>" required  autocomplete="off"/>
                                        </div>
                                    </div>	
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="pass">Contraseña</label>
                                            <input class="form-control py-4" id="pass" name="pass" type="text" value="<?php echo $el['pass']?>" required  autocomplete="off"/>
                                        </div>
                                    </div>	
                                </div>

                                    <div class="col-11">	
                                    </div>
                                    <input type="hidden" name="idPersona" value="<?=$el['idPersona']?>" > 
                                    <input type="hidden" name="telefonos_idTelefono" value="<?=$el['telefonos_idTelefono']?>" > 
                                    <input type="submit" name="guardar" class="btn btn-success"> 
                                    <a href="../Clientesadmin" class="btn btn-danger">Cancelar</a>
                                </form>
						<?php };}else{?> 
                            
							<ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Reservación/Clientes/Nuevo</li>
							</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Clientes</div>
                            <div class="card-body">
                                
                            <form method="post" action="guardar" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="nombre">Nombre del Cliente</label>
                                            <input class="form-control py-4" id="nombre" name="nombre" type="text" placeholder="Ingresa el nombre" required  autocomplete="off"/>
                                        </div>
                                    </div>
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="apellido1">Apellido Paterno</label>
                                            <input class="form-control py-4" id="apellido1" name="apellido1" type="text" placeholder="Ingresa el apellido Paterno" required  autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="apellido2">Apellido Materno</label>
                                            <input class="form-control py-4" id="apellido2" name="apellido2" type="text" placeholder="Ingresa el apellido Materno" required  autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label class="small mb-1" for="numTelefono">Teléfono</label>
                                            <input class="form-control py-4" id="numTelefono" name="numTelefono" type="text" placeholder="Ingresa el número de telefono" required  autocomplete="off"/>
                                        </div>
                                    </div>	
                                    <div class="col-3">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="pass">Contraseña</label>
                                            <input class="form-control py-4" id="pass" name="pass" type="password" placeholder="**********" required  autocomplete="off"/>
                                        </div>
                                    </div>	
                                </div>
                                    <input type="submit" name="guardar" class="btn btn-success"> 
                                    <a href="../Clientesadmin" class="btn btn-danger">Cancelar</a>
                                </form>
							<?php } ?>
                            </div>
                        </div>
                    </div>
				</main>
			
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php'); 
?>         
