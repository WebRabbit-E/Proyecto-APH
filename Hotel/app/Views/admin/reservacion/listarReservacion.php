<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de Reservaciones</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Reservaciones</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Reservaciones</div>
                            <div class="card-body" height="100">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="Reservacionadmin/nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Fecha</th>
                                                <th>Estancia</th>
                                                <th>Estatus</th>      
                                                <th></th>
                                                <th></th>                                          
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Fecha</th>
                                                <th>Estancia</th>
                                                <th>Estatus</th>      
                                                <th></th>
                                                <th></th>    
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($res as $el):?>
                                            <tr>
                                                <td><?=$el['nombre']?> <?=$el['apellido1']?> <?=$el['apellido2']?></td>
                                                <td><?=$el['fechaEntrada']?> / <?=$el['fechaSalida']?> </td></td>
                                                <td><?=$el['estancia']?></td>
                                                    <?php if($el['aprovado']=='No Aprovado'):?>
														<td style="background-color: orange"><?php echo $el['aprovado']?></td>
													<?php else: ?>
														<td style="background-color: lightgreen"><?php echo $el['aprovado']?></td>
													<?php endif; ?>
                                                
                                                <td>
                                                    <form action="Reservacionadmin/actualizarInfo" method="post" enctype="multipart/form-data"><!--guardar.php-->
                                                    
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
                                                            data-content="¿Esta seguro que quieres actualizar esta reservación?">
                                                            Editar 
                                                               <input type="hidden" name="idReservacion" value="<?=$el['idReservacion']?>" >                                                 
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="Reservacionadmin/eliminarReservacion" method="post" enctype="multipart/form-data"><!--eliminar.php-->
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
                                                            data-content="¿Esta seguro que quieres eliminar esta reservación?">
                                                            Eliminar <input type="hidden" name="idReservacion" value="<?=$el['idReservacion']?>">
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?> 
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