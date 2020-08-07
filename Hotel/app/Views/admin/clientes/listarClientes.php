<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de Clientes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Reservación/Clientes</li>
                        </ol>
                           
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Clientes</div>
                            <div class="card-body" height="100">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="Clientesadmin/nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Contraseña</th>
                                                <th>Telefono</th>      
                                                <th></th>
                                                <th></th>                                          
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>Contraseña</th>
                                                <th>Telefono</th>
                                                <th></th>
                                                <th></th>   
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($client as $el):?>
                                            <tr>
                                                <td><?=$el['nombre']?></td>
                                                <td><?=$el['apellido1']?> <?=$el['apellido2']?></td></td>
                                                <td>*****</td>
                                                <td><?=$el['numTelefono']?></td>
                                                <td>
                                                    <form method="post" action="Clientesadmin/actualizarInfo" enctype="multipart/form-data"><!--guardar.php-->
                                                    
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
                                                            data-content="¿Esta seguro que quieres actualizar este cliente?">
                                                            Editar 
                                                               <input type="hidden" name="idPersona" value="<?=$el['idPersona']?>" >                                                 
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="Clientesadmin/eliminarCliente" method="post" enctype="multipart/form-data"><!--eliminar.php-->
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
                                                            data-content="¿Esta seguro que quieres eliminar este cliente?">
                                                            Eliminar <input type="hidden" name="idPersona" value="<?=$el['idPersona']?>">
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