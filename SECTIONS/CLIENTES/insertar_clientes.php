<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<body>

    <!-- Modal de Inserción -->
    <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Insertar Registro del Cliente</h3>
                </div>
                <div class="modal-body">
                    <form action="../DAL/funciones_clientes.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="id_cliente">Id Cliente</label>
                                        <input type="text" id="id_cliente" class="form-control" placeholder="0">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Cliente</label>
                                <input type="text" id="nombre_insertado" name="nombre_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="apellidos" class="form-label">Apellidos del Cliente</label>
                                <input type="text" id="apellidos_insertado" name="apellidos_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email del Cliente</label>
                                <input type="email" id="email_insertado" name="email_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono del Cliente</label>
                                <input type="text" id="telefono_insertado" name="telefono_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6">
                              <label for="">Provincia</label>
                                <select id="slt-provincias" name="provincia_insertado" class="form-control" value="" required>>
                                   <option value="">Seleccione una provincia</option>
                                </select>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Canton</label>
                                   <select id="slt-cantones" name="canton_insertado" class="form-control" value="" required>>
                                       <option value="">Seleccione un cantón</option>
                                    </select>
                            </div>
                        </div>     
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="">Distrito</label>
                                    <select id="slt-distritos" name="distrito_insertado" class="form-control" value="" required>>
                                        <option  value="">Seleccione un distrito</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección del Cliente</label>
                                <input type="text" id="direccion_insertado" name="direccion_insertado" class="form-control"  value="" required>
                            </div>
                        </div>
                        </div>
                        <input type="hidden" name="accion" value="insertar_clientes">
                        <input type="hidden" name="id_cliente" value="0">
                        <br>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Insertar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../INCLUDE/js/distribucion-cr.js"></script> 
    <script src="../INCLUDE/js/formulario.js"></script>    
</body>

</html>
