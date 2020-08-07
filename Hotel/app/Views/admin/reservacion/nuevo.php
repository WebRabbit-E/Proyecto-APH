<?php 
	include_once('..\app\Views\templateAdmin\headerAdmin.php'); 
?>
                        	
            <div id="layoutSidenav_content">
            	<main>
                    <div class="container-fluid">
						<h1 class="mt-4">Reservaciones</h1>
						
						<?php if($_POST){ foreach ($res as $r){?>
                            
                            <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Reservacion/Nuevo</li>
                            </ol>
                            
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona un Cliente</div> 
                            <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div id="text" class="col-10">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i> Cliente seleccionado
                                        <button class="btn btn-success" onclick="cargarTabla()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>	
                                    <div class="col-10">
                                    <div class="table-responsive">
                                   
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Nombre</th><th>Apellidos</th><th></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($client as $el):?>
                                                    <tr>
                                                        <td style="background-color: lightblue" ><?=$el['idCliente']?></td>
                                                        <td><?=$el['nombre']?></td>
                                                        <td><?=$el['apellido1']?> <?=$el['apellido2']?></td>
                                                        <td>  
                                                            <button class="btn btn-primary" onclick="loadIdTipo(<?=$el['idCliente']?>)">
                                                            Seleccionar       
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>	
                                        </table>		
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Cuartos</div> 
                            <div class="card-body">
                            <div class="row">
                               

                                <form method="post" action="actualizar" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-2">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="idClienteR">Cliente</label>
                                            <input style="background-color: lightblue" class="form-control py-4" id="idClienteR" name="idClienteR" type="text" value="<?php echo $el['idCliente']?>" required autocomplete="off"/>
                                        </div>
                                    </div>  
                                    <div class="col-5">	
										<div class="form-group">
										 	<label class="small mb-1" for="fechaEntrada">Fecha Inicio</label>
										 	<input class="form-control py-4" id="fechaEntrada" name="fechaEntrada" value="<?php echo $r['fechaEntrada']?>" type="date" required/>
										</div>
										</div>  
                                    <div class="col-5">	
										<div class="form-group">
                                             <label class="small mb-1" for="fechaSalida">Fecha Fin</label>
                                             <input type="hidden" name="idReservacion" value="<?=$r['idReservacion']?>" >
										 	<input class="form-control py-4" id="fechaSalida" name="fechaSalida" value="<?php echo $r['fechaSalida']?>" type="date" required/>
										</div>
									</div>
                                </div>

                                    <div class="col-11">	
                                    </div>
                                <input type="submit" name="guardar" class="btn btn-success"> 
                                <a href="../Reservacionadmin" class="btn btn-danger">Cancelar</a>
                            </form>
                            </div>
                            </div>

                       <?php }}else{?> 
                            
                            <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Reservacion/Nuevo</li>
                            </ol>
                            
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona un Cliente</div> 
                            <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div id="text" class="col-10">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i> Cliente seleccionado
                                        <button class="btn btn-success" onclick="cargarTabla()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>	
                                    <div class="col-10">
                                    <div class="table-responsive">
                                   
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Nombre</th><th>Apellidos</th><th></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($client as $el):?>
                                                    <tr>
                                                        <td style="background-color: lightblue" ><?=$el['idCliente']?></td>
                                                        <td><?=$el['nombre']?></td>
                                                        <td><?=$el['apellido1']?> <?=$el['apellido2']?></td>
                                                        <td>  
                                                            <button class="btn btn-primary" onclick="loadIdTipo(<?=$el['idCliente']?>)">
                                                            Seleccionar       
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>	
                                        </table>		
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Cuartos</div> 
                            <div class="card-body">
                            <div class="row">
                               

                                <form method="post" action="guardar" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-2">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="idClienteR">Cliente</label>
                                            <input style="background-color: lightblue" class="form-control py-4" id="idClienteR" name="idClienteR" type="text" required autocomplete="off"/>
                                        </div>
                                    </div>  
                                    <div class="col-5">	
										<div class="form-group">
										 	<label class="small mb-1" for="fechaEntrada">Fecha Inicio</label>
										 	<input class="form-control py-4" id="fechaEntrada" name="fechaEntrada" type="date" required/>
										</div>
										</div>  
                                    <div class="col-5">	
										<div class="form-group">
										 	<label class="small mb-1" for="fechaSalida">Fecha Fin</label>
										 	<input class="form-control py-4" id="fechaSalida" name="fechaSalida" type="date" required/>
										</div>
									</div>
                                </div>

                                    <div class="col-11">	
                                    </div>
                                <input type="submit" name="guardar" class="btn btn-success"> 
                                <a href="../Reservacionadmin" class="btn btn-danger">Cancelar</a>
                            </form>
                            </div>
                            </div>
						<?php } ?>   
                    </div>
				</main>
<script>
    document.getElementById('text').style.display="none";
    function loadIdTipo(idCliente)
    {   
        document.getElementById('idClienteR').value=idCliente;
        document.getElementById('dataTable').style.display="none";
        document.getElementById('text').style.display="block"; 
        //document.getElementById('text').innerHTML="El tipo de cuarto seleccionado es "+tipoCuarto+".";
    }
    function cargarTabla()
    {
        document.getElementById('dataTable').style.display="block";
        document.getElementById('text').style.display="none";
        document.getElementById('idClienteR').value="";
    }
    
</script>                
			
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php'); 
?>  



                    