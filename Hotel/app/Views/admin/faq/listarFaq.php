<?php 
include_once('..\app\Views\templateAdmin\headerAdmin.php');
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Lista de eventos</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Administración/Sitio Web/Preguntas Frecuentes</li>
                        </ol>
                       
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Preguntas Frecuentes</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <a class="btn btn-success" href="Faqsadmin/nuevo">+ Nuevo</a>
                                            </tr>
                                            <tr>
                                                <th>Pregunta</th>
                                                <th>Respuesta</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Pregunta</th>
                                                <th>Respuesta</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php foreach ($faq as $el):?>   
                                            <tr>
                                                <td><?=$el['pregunta']?></td>
                                                <td><?=$el['respuesta']?></td>
                                                <td>
                                                    <form action="Faqsadmin/actualizarInfo" method="post" enctype="multipart/form-data"><!--guardar.php-->
                                                    
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
                                                            data-content="¿Esta seguro que quieres actualizar este elemento?">
                                                            Editar <input type="hidden" name="idFaq" value="<?=$el['idFaq']?>">
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="Faqsadmin/borrar" method="post" enctype="multipart/form-data"><!--eliminar.php-->
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
                                                            data-content="¿Esta seguro que quieres eliminar la pregunta?">
                                                            Eliminar <input type="hidden" name="idFaq" value="<?=$el['idFaq']?>">
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