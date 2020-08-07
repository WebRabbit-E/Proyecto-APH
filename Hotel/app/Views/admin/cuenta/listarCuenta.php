<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Cuentas</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Reservaciones/Cuentas</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Reservaciones</div>
                            <div class="card-body" height="100">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="Cuentadmin\nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Apellidos</th>
                                                <th>Cuarto</th>
                                                <th>Total</th>      
                                                <th></th>
                                                <th></th>                                          
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Cliente</th>
                                                <th>Apellidos</th>
                                                <th>Cuarto</th>
                                                <th>Total</th>      
                                                <th></th>
                                                <th></th>    
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($cu as $el):?>
                                            <tr>
                                                <td><?=$el['nombre']?></td>
                                                <td><?=$el['apellido1']?> <?=$el['apellido2']?></td>
                                                <td><?=$el['numCuarto']?></td>
                                                <td>$ <?=$el['total']?></td>        
                                                <!--
                                                <td>
                                            
                                                    <form method="post" action="Cuentadmin/actualizarInfo" enctype="multipart/form-data">
                                                    
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
                                                            data-content="¿Esta seguro que quieres actualizar esta cuenta?">
                                                            Editar 
                                                               <input type="hidden" name="idCuenta" value="<//?=$el['idCuenta']?>" >                                                 
                                                        </button>
                                                    </form>
                                                </td>-->
                                                <td>
                                                <button  class="btn btn-warning"> Ver Detalles </button>
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