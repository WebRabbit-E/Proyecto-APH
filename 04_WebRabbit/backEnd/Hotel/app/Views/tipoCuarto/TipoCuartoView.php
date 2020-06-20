

              <!--//////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////SECCION DEL BODY?////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////-->  
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tipo de cuarto</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Tipo de cuarto</li>
                            </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1">
                                <div class="row">   
                                    <div class="col-10">
                                        </i>Gestionar Tipo de cuarto
                                    </div>   
                    
                                        <a href="<?php echo base_url(); ?>/index.php/TelefonosController/agregarTelefonos" class="btn btn-success" role="button" >Nuevo</a>

                                
                                    </div>  
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <?php if (count($tipoCuarto)>0): ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($tipoCuarto as $elemento):?> <!--Para cada elemento crear un vector-->
                                                <tr>
                                                    <td><?php echo $elemento['idTipoCuarto']?></td>
                                                    <td><?php echo $elemento['tipoCuarto']?></td>
                                                    <td><?php echo $elemento['precioCuarto']?></td>

                                                    <td>
                                                       <a href="<?php echo base_url();?>/index.php/home/editarPersona?idPersona=<?php echo $elemento['idTipoCuarto']; ?>" class="btn btn-primary" role="button"><i class="fa fa-pencil"></i></a>
                                                    </td>   
                                                    <td>
                                                         <a href="<?php echo base_url();?>/index.php/home/borrarPersona?idPersona=<?php echo $elemento['idTipoCuarto']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a>
                                                    </td>       
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>    
                                    </table>    
                                        <?php else: ?>  
                                            <p> No hay telefonos agregados </p>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>









