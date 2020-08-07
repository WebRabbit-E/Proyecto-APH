<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de eventos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Administración/Sitio Web/Eventos</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Eventos</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="Admineventos/nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Evento</th>
                                                <th>Descripción</th>
                                                <th>Imagen</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Evento</th>
                                                <th>Descripción</th>
                                                <th>Imagen</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($eve as $el):?>   
                                            <tr>
                                                <td><?=$el['nombreEvento']?></td>
                                                <td><?=$el['descEvento']?></td>
                                                <td>    
                                                    <img style="width:75px;"  src="<?=base_url("vendor/template/img/".$el['imgEve'])?>">
                                                </td>
                                                <td>
                                                    <form role="form" method="post" enctype="multipart/form-data" action="AdminEventos/actualizarInfo"><!--guardar.php-->
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
                                                            data-content="¿Esta seguro que quieres actualizar el evento <?=$el['nombreEvento']?>?">
                                                            Editar<input type="hidden" name="idEvento" value="<?=$el['idEvento']?>">
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="post" action="AdminEventos/borrar" enctype="multipart/form-data"><!--eliminar.php-->
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
                                                            data-content="¿Esta seguro que quieres eliminar el evento?">
                                                            Eliminar <input type="hidden" name="idEvento" value="<?=$el['idEvento']?>">
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
