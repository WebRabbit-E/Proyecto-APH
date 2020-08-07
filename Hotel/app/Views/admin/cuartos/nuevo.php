<?php 
	include_once('..\app\Views\templateAdmin\headerAdmin.php'); 
?>
                        	
            <div id="layoutSidenav_content">
            	<main>
                    <div class="container-fluid">
						<h1 class="mt-4">Cuartos</h1>
						
						<?php if($_POST){ 
                            foreach ($room as $cu):?>

	                        <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Administración/Cuartos/Nuevo</li>
							</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona un tipo de cuarto/Formulario para Cuartos</div> 
                            <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <div class="table-responsive">
                                    <div id="text">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i>Tipo de cuarto seleccionado correctamente
                                        <button onclick="cargarTabla()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>		
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Tipo de Cuarto</th><th>Precio de Cuarto</th><th>Seleccionar</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tipo as $el):?>
                                                    <tr>
                                                        <td style="background-color: lightblue" ><?=$el['idTipoCuarto']?></td>
                                                        <td><?=$el['tipoCuarto']?></td>
                                                        <td>$<?=$el['precioCuarto']?></td>
                                                        <td>
                                                           
                                                            <button onclick="loadIdTipo(<?=$el['idTipoCuarto']?>)">
                                                                Usar        
                                                            </button>
                                                           
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>	
                                        </table>	
                                    </div>
                                </div>

                                <form  action="actualizar" method="post" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-5">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="idTipoCuartoR">Tipo de Cuarto</label>
                                            <input class="form-control py-4" id="idTipoCuartoR" name="idTipoCuartoR" type="text" value="<?php echo $cu['tipoCuarto_idTipoCuarto']?>" required autocomplete="off"/>
                                        </div>
                                    </div>     
                                    <div class="col-5">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="identificador">Identificador</label>
                                            <input class="form-control py-4" id="identificador" name="identificador" type="text" value="<?php echo $cu['numCuarto']?>" required  autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
                                    
                                    <input type="hidden" name="idCuarto" value="<?=$cu['idCuarto']?>" > 
                                <input type="submit" name="guardar" class="btn btn-success"> 
                                <a href="../Cuartosadmin" class="btn btn-danger">Cancelar</a>
                            </form>
                            </div>
                            </div>
                        <?php endforeach;
                        }else{?> 
                            
                            <ol class="breadcrumb mb-4">
	                            <li class="breadcrumb-item active">Administración/Cuartos/Nuevo</li>
							</ol>
							<div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Seleciona un tipo de cuarto/Formulario para Cuartos</div> 
                            <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <div class="table-responsive">
                                    <div id="text">
                                        <h5>
                                        <div class="card-header"><i class="fas fa-check"></i>Tipo de cuarto seleccionado correctamente
                                        <button onclick="cargarTabla()"> Volver a seleccionar</button>    
                                        </div>                        
                                        </h5>
                                    </div>	
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Tipo de Cuarto</th><th>Precio de Cuarto</th><th>Seleccionar</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tipo as $el):?>
                                                    <tr>
                                                        <td style="background-color: lightblue" ><?=$el['idTipoCuarto']?></td>
                                                        <td><?=$el['tipoCuarto']?></td>
                                                        <td>$<?=$el['precioCuarto']?></td>
                                                        <td>
                                                           <!--eliminar.php-->
                                                            <button onclick="loadIdTipo(<?=$el['idTipoCuarto']?>)">
                                                                Usar        
                                                            </button>
                                                           
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>	
                                        </table>	
                                    </div>
                                </div>

                                <form method="post" action="guardar" enctype="multipart/form-data">              
                                <div class="row">
                                    <div class="col-5">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="idTipoCuartoR">Tipo de Cuarto</label>
                                            <input class="form-control py-4" id="idTipoCuartoR" name="idTipoCuartoR" type="text" required autocomplete="off"/>
                                        </div>
                                    </div>     
                                    <div class="col-5">	
                                        <div class="form-group">
                                            <label class="small mb-1" for="identificador">Identificador</label>
                                            <input class="form-control py-4" id="identificador" name="identificador" type="text" required  autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-11">	
                                    </div>
                                <input type="submit" name="guardar" class="btn btn-success"> 
                                <a href="../Cuartosadmin" class="btn btn-danger">Cancelar</a>
                            </form>
                            </div>
                            </div>
						<?php } ?>   
                    </div>
				</main>
<script>
    document.getElementById('text').style.display="none";
    function loadIdTipo(idTipoCuarto)
    {
        document.getElementById('idTipoCuartoR').value=idTipoCuarto;
        document.getElementById('dataTable').style.display="none";
        document.getElementById('text').style.display="block"; 
        //document.getElementById('text').innerHTML="El tipo de cuarto seleccionado es "+tipoCuarto+".";
    }
    function cargarTabla()
    {
        document.getElementById('dataTable').style.display="block";
        document.getElementById('text').style.display="none";
    }
</script>                
			
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php'); 
?>  



                    