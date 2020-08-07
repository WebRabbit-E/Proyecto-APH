<?php 
	include_once('..\app\Views\templateAdmin\headerAdmin.php'); 
?>
                        	
            <div id="layoutSidenav_content">
            	<main>
                    <div class="container-fluid">
						<h1 class="mt-4">Cuentas</h1>
						
						<?php if($_POST){ foreach ($cu as $c){?>
                            <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Cuenta/Nuevo</li>
                            </ol>
                           
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona una Reservación</div> 
                            <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div id="text" class="col-10">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i> Reservación Seleccionada
                                        <button class="btn btn-success" onclick="cargarTabla()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>	
                                    <div class="col-10">
                                    <div class="table-responsive">
                                   
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Nombre</th><th>Apellidos</th><th>Reservación</th><th></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($res as $el):?>
                                                    <tr>
                                                        <td style="background-color: lightblue" ><?=$el['idReservacion']?></td>
                                                        <td><?=$el['nombre']?></td>
                                                        <td><?=$el['apellido1']?> <?=$el['apellido2']?></td>
                                                        <td><?=$el['fechaEntrada']?> / <?=$el['fechaSalida']?></td>
                                                        <td>
                                                        <button class="btn btn-primary" onclick="loadIdTipo(<?=$el['idReservacion']?>)">  
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

                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona una Cuarto</div> 
                            <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div id="cuarto" class="col-10">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i> Cuarto Seleccionado
                                        <button class="btn btn-success" onclick="cargarCuarto()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>	
                                    <div class="col-10">
                                    <div class="table-responsive">
                                   
                                        <table class="table table-bordered" id="dataTable-Room" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Identificador</th><th>Disponibilidad</th><th>Precio</th><th></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($room as $el):?>
                                                    <tr>
                                                        <td style="background-color: #FFA420" ><?=$el['idCuarto']?></td>
                                                        <td><?=$el['numCuarto']?></td>
                                                        <td><?=$el['estatus']?></td>
                                                        <td><?=$el['precioCuarto']?></td>
                                                        <td>  
                                                            <?php if( $el['estatus'] == 'DISPONIBLE'){?>
                                                            <button class="btn btn-primary" onclick="loadIdCuarto(<?=$el['idCuarto']?>)">
                                                            Seleccionar       
                                                            </button>
                                                            <?php }else{?>
                                                                ***
                                                            <?php }?>    
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
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Cuentas</div> 
                            <div class="card-body">
                            <div class="row">
                               

                                <form method="post" action="actualizar" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-5">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="idReservacionR">Id Reservación</label>
                                            <input style="background-color: lightblue" class="form-control py-4" id="idReservacionR" name="idReservacionR" value="<?php echo $c['reservaciones_idReservacion']?>" type="number" required autocomplete="off"/>
                                        </div>
                                    </div>  
                                    <div class="col-5">	
										<div class="form-group">
										 	<label class="small mb-1" for="idCuartoR">IdCuarto</label>
										 	<input style="background-color: #FFA420" class="form-control py-4" id="idCuartoR" name="idCuartoR" type="number" value="<?php echo $c['cuartos_idCuarto']?>" required autocomplete="off"/>
										</div>
										</div>  
                                </div>

                                    <div class="col-11">	
                                    </div>
                                <input type="submit" name="guardar" class="btn btn-success"> 
                                <a href="../Cuentadmin" class="btn btn-danger">Cancelar</a>
                            </form>
                            </div>
                            </div>

                       <?php }}else{?> 
                            
                        <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Cuenta/Nuevo</li>
                            </ol>
                            
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona una Reservación</div> 
                            <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div id="text" class="col-10">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i> Reservación Seleccionada
                                        <button class="btn btn-success" onclick="cargarTabla()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>	
                                    <div class="col-10">
                                    <div class="table-responsive">
                                   
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Nombre</th><th>Apellidos</th><th>Reservación</th><th></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($res as $el):?>
                                                    <tr>
                                                        <td style="background-color: lightblue" ><?=$el['idReservacion']?></td>
                                                        <td><?=$el['nombre']?></td>
                                                        <td><?=$el['apellido1']?> <?=$el['apellido2']?></td>
                                                        <td><?=$el['fechaEntrada']?> / <?=$el['fechaSalida']?></td>
                                                        <td>  
                                                        <?php if( $el['aprovado'] == 'No Aprovado'){?>
                                                            <button class="btn btn-primary" onclick="loadIdTipo(<?=$el['idReservacion']?>)"">
                                                            Seleccionar       
                                                            </button>
                                                            <?php }else{?>
                                                                ***
                                                            <?php }?> 
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

                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona una Cuarto</div> 
                            <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div id="cuarto" class="col-10">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i> Cuarto Seleccionado
                                        <button class="btn btn-success" onclick="cargarCuarto()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>	
                                    <div class="col-10">
                                    <div class="table-responsive">
                                   
                                        <table class="table table-bordered" id="dataTable-Room" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Identificador</th><th>Disponibilidad</th><th>Precio</th><th></th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($room as $el):?>
                                                    <tr>
                                                        <td style="background-color: #FFA420" ><?=$el['idCuarto']?></td>
                                                        <td><?=$el['numCuarto']?></td>
                                                        <td><?=$el['estatus']?></td>
                                                        <td><?=$el['precioCuarto']?></td>
                                                        <td>  
                                                            <?php if( $el['estatus'] == 'DISPONIBLE'){?>
                                                            <button class="btn btn-primary" onclick="loadIdCuarto(<?=$el['idCuarto']?>)">
                                                            Seleccionar       
                                                            </button>
                                                            <?php }else{?>
                                                                ***
                                                            <?php }?>    
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
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Formulario para Cuentas</div> 
                            <div class="card-body">
                            <div class="row">
                               

                                <form method="post" action="guardar" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-5">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="idReservacionR">Id Reservación</label>
                                            <input style="background-color: lightblue" class="form-control py-4" id="idReservacionR" name="idReservacionR" type="number" required autocomplete="off"/>
                                        </div>
                                    </div>  
                                    <div class="col-5">	
										<div class="form-group">
										 	<label class="small mb-1" for="idCuartoR">IdCuarto</label>
										 	<input style="background-color: #FFA420" class="form-control py-4" id="idCuartoR" name="idCuartoR" type="number" required autocomplete="off"/>
										</div>
										</div>  
                                </div>

                                    <div class="col-11">	
                                    </div>
                                <input type="submit" name="guardar" class="btn btn-success"> 
                                <a href="../Cuentadmin" class="btn btn-danger">Cancelar</a>
                            </form>
                            </div>
                            </div>
						<?php } ?>   
                    </div>
				</main>
<script>
    document.getElementById('cuarto').style.display="none";
    document.getElementById('text').style.display="none";
    function loadIdTipo(idReservacion)
    {   
        document.getElementById('idReservacionR').value=idReservacion;
        document.getElementById('dataTable').style.display="none";
        document.getElementById('text').style.display="block"; 
        //document.getElementById('text').innerHTML="El tipo de cuarto seleccionado es "+tipoCuarto+".";
    }
    function cargarTabla()
    {
        document.getElementById('dataTable').style.display="block";
        document.getElementById('text').style.display="none";
        document.getElementById('idReservacionR').value="";
    }
    function loadIdCuarto(idCuarto)
    {   
        document.getElementById('idCuartoR').value=idCuarto;
        document.getElementById('dataTable-Room').style.display="none";
        document.getElementById('cuarto').style.display="block"; 
        //document.getElementById('text').innerHTML="El tipo de cuarto seleccionado es "+tipoCuarto+".";
    }
    function cargarCuarto()
    {
        document.getElementById('dataTable-Room').style.display="block";
        document.getElementById('cuarto').style.display="none";
        document.getElementById('idCuartoR').value="";
    }
    
</script>                
			
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php'); 
?>  



                    