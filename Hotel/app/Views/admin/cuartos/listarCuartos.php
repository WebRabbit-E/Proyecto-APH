<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de Cuartos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Administración/Cuartos</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Cuartos</div>
                            <div class="card-body" height="100">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="Cuartosadmin/nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Tipo de cuarto</th>
                                                <th>Identificador</th>
                                                <th>Disponibilidad</th>     
                                                <th></th>
                                                <th></th>                                          
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Tipo de cuarto</th>
                                                <th>Identificador</th>
                                                <th>Disponibilidad</th>     
                                                <th></th>
                                                <th></th> 
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($room as $el):?>
                                            <tr>
                                                <td><?=$el['tipoCuarto']?></td>
                                                <td><?=$el['numCuarto']?></td>                                                
                                                    <?php if($el['estatus']=='DISPONIBLE'):?>
														<td style="background-color: lightgreen"><?php echo $el['estatus']?></td>
													<?php else: ?>
														<td style="background-color: orange"><?php echo $el['estatus']?></td>
													<?php endif; ?>
                                                <td>
                                                    <form action="Cuartosadmin/actualizarInfo" method="post" enctype="multipart/form-data"><!--guardar.php-->
                                                    
                                                        <button 
                                                            type="submit" 
                                                            class="btn btn-primary" 
                                                            data-toggle="confirmation" 
                                                            data-btn-ok-label="Continuar" 
                                                            data-btn-ok-class="btn-success" 
                                                            data-singleton="true" 
                                                            data-placement="left" 
                                                            data-btn-ok-icon-class="material-icons" 
                                                            data-btn-ok-icon-content="" 
                                                            data-btn-cancel-label="Cancelar" 
                                                            data-btn-cancel-class="btn-danger" 
                                                            data-btn-cancel-icon-class="material-icons" 
                                                            data-btn-cancel-icon-content="" 
                                                            data-title="Esta apunto de actualizar" 
                                                            data-content="¿Esta seguro que quieres actualizar este usuario?">
                                                            Editar 
                                                               <input type="hidden" name="idCuarto" value="<?=$el['idCuarto']?>" >                                              
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <?php if($el['estatus']=='DISPONIBLE'):?>
                                                        <form action="Cuartosadmin/eliminarCuarto" method="post" enctype="multipart/form-data"><!--eliminar.php-->
                                                        <button 
                                                            type="submit" 
                                                            class="btn btn-danger" 
                                                            data-toggle="confirmation" 
                                                            data-btn-ok-label="Continuar" 
                                                            data-btn-ok-class="btn-success" 
                                                            data-singleton="true" 
                                                            data-placement="left" 
                                                            data-btn-ok-icon-class="material-icons" 
                                                            data-btn-ok-icon-content="" 
                                                            data-btn-cancel-label="Cancelar" 
                                                            data-btn-cancel-class="btn-danger" 
                                                            data-btn-cancel-icon-class="material-icons" 
                                                            data-btn-cancel-icon-content="" 
                                                            data-title="Esta apunto de eliminar" 
                                                            data-content="¿Esta seguro que quieres eliminar este usuario?">
                                                            Eliminar <input type="hidden" name="idCuarto" value="<?=$el['idCuarto']?>" > 
                                                        </button>
                                                    </form>
													<?php else: ?>
														
													<?php endif; ?>
                                                   
                                                </td>
                                            </tr>
                                        <?php endforeach;?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
include_once('..\app\Views\templateAdmin\footerAdmin.php');
?>   