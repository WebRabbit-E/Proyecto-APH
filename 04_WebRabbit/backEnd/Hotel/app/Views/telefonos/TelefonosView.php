

              <!--//////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////SECCION DEL BODY?////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////-->  
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">TELEFONOS</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">TELEFONOS</li>
                            </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1">
                                <div class="row">   
                                    <div class="col-10">
                                        </i>Gestionar TELEFONOS
                                    </div>   
                    
                                        <a href="<?php echo base_url(); ?>/index.php/TelefonosController/agregarTelefonos" class="btn btn-success" role="button" >Nuevo</a>

                                
                                    </div>  
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <?php if (count($telefonos)>0): ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Telefono</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($telefonos as $elemento):?> <!--Para cada elemento crear un vector-->
                                                <tr>
                                                    <td><?php echo $elemento['idTelefono']?></td>
                                                    <td><?php echo $elemento['numTelefono']?></td>

                                                    <td>
                                                       <a href="<?php echo base_url();?>/index.php/home/editarPersona?idPersona=<?php echo $elemento['idTelefono']; ?>" class="btn btn-primary" role="button"><i class="fa fa-pencil"></i></a>
                                                    </td>   
                                                    <td>
                                                         <a href="<?php echo base_url();?>/index.php/home/borrarPersona?idPersona=<?php echo $elemento['idTelefono']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a>
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









