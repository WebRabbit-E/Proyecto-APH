

              <!--//////////////////////////////////////////////////////////////////////////////////
                ////////////////////////////////////////SECCION DEL BODY?////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////-->  
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">PERSONAS</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">PERSONAS</li>
                            </ol>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1">
                                <div class="row">   
                                    <div class="col-10">
                                        </i>Gestionar PERSONAS
                                    </div>   
                                        <a href="index.php/home/agregarpersonas" class="btn btn-success"><i class="fa  fa-user-plus"></i> Agregar Nuevo</a>
                                
                                    </div>  
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <?php if (count($personas)>0): ?>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Telefono</th>
                                                    <th>Nombre</th>
                                                    <th>1er apellido</th>
                                                    <th>2do apellido</th>
                                                    <th>Privilegios</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($personas as $elemento):?> <!--Para cada elemento crear un vector-->
                                                <tr>
                                                    <td><?php echo $elemento['idPersona']?></td>
                                                    <td><?php echo $elemento['telefonos_idTelefono']?></td>
                                                    <td><?php echo $elemento['nombre']?></td>
                                                    <td><?php echo $elemento['apellido1']?></td>
                                                    <td><?php echo $elemento['apellido2']?></td>
                                                    <td><?php echo $elemento['privilegios']?></td>

                                                    <td>
                                                       <a href="<?php echo base_url();?>/index.php/home/editarPersona?idPersona=<?php echo $elemento['idPersona']; ?>" class="btn btn-primary" role="button"><i class="fa fa-pencil"></i></a>
                                                    </td>   
                                                    <td>
                                                         <a href="<?php echo base_url();?>/index.php/home/borrarPersona?idPersona=<?php echo $elemento['idPersona']; ?>" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a>
                                                    </td>       
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>    
                                    </table>    
                                        <?php else: ?>  
                                            <p> No hay Usuarios agregados </p>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>









