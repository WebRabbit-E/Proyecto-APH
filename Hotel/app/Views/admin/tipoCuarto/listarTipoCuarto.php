<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de Tipos de Cuartos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Administración/Cuartos/Tipo Cuarto</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Tipos Cuartos</div>
                            <div class="card-body" height="100">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="TipoCuartoAdmin/nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Tipo de Cuarto</th>
                                                <th>Precio de Cuarto</th>
                                                <th>Imagen</th>
                                                <th>Descripción</th>      
                                                <th></th>
                                                <th></th>                                          
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Tipo de Cuarto</th>
                                                <th>Precio de Cuarto</th>
                                                <th>Imagen</th>
                                                <th>Descripción</th>      
                                                <th></th>
                                                <th></th>    
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($tipo as $el):?>
                                            <tr>
                                                <td style=" background-color: lightblue" ><?=$el['tipoCuarto']?></td>
                                                <td style=" background-color: lightgreen" >$<?=$el['precioCuarto']?></td>
                                                <td><img  style="width:75px;" src="<?=base_url("vendor/template/img/".$el['imgUrl'])?>"></td>
                                                <td><?=$el['description']?></td>
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
                                                            data-content="¿Esta seguro que quieres actualizar este tipo de cuarto?">
                                                            Editar 
                                                               <input type="hidden" name="idTipoCuarto" value="<?=$el['idTipoCuarto']?>" >                                                 
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="TipoCuartoAdmin/borrar" method="post" enctype="multipart/form-data"><!--eliminar.php-->
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
                                                            data-content="¿Esta seguro que quieres eliminar este tipo de cuarto?">
                                                            Eliminar <input type="hidden" name="idTipoCuarto" value="<?=$el['idTipoCuarto']?>">
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