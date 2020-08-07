<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de Servicios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Administración/Hotel/Servicios</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Servicios</div>
                            <div class="card-body" height="100">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="Serviciosadmin/nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Nombre del Servicio</th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th>Imagen</th>      
                                                <th></th>
                                                <th></th>                                          
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre del Servicio</th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th>Imagen</th>      
                                                <th></th>
                                                <th></th>     
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($ser as $el):?>
                                            <tr>
                                                <td style=" background-color: lightblue" ><?=$el['nombreServicio']?></td>
                                                <td><?=$el['descripcion']?></td>
                                                <td style=" background-color: lightgreen">$<?=$el['precioServicio']?></td>
                                                <td><img  style="width:75px;" src="<?=base_url("vendor/template/img/".$el['servicioIMG'])?>"></td>                                                
                                                <td>
                                                    <form method="post" action="" enctype="multipart/form-data"><!--guardar.php-->
                                                    
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
                                                            data-title="Esta apunto de eliminar" 
                                                            data-content="¿Esta seguro que quieres actualizar este servicio?">
                                                            Editar 
                                                               <input type="hidden" name="idServicio" value="<?=$el['idServicio']?>">                                                 
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="Serviciosadmin/borrar" method="post" enctype="multipart/form-data"><!--eliminar.php-->
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
                                                            data-content="¿Esta seguro que quieres eliminar este servicio?">
                                                            Eliminar <input type="hidden" name="idServicio" value="<?=$el['idServicio']?>">
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