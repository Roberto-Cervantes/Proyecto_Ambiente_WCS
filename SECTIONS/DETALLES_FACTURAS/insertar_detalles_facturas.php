<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Insertar Registro del Cliente
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
                                <label for="nombre" class="form-label">Nombre Cliente</label>
                                <input type="text" id="nombre_insertado" name="nombre_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido del Cliente</label>
                                <input type="text" id="apellido_insertado" name="apellido_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id_distrito" class="form-label">ID Distrito</label>
                                <select id="id_distrito_insertado" name="id_distrito_insertado" class="form-control" required>
                                      
                                      <option value="1">--</option> 
                                      <option value="1">District 1</option> 
                                      <option value="2">District 2</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono del Cleinte</label>
                                <input type="text" id="telefono_insertado" name="telefono_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email del Cliente</label>
                                <input type="email" id="email_insertado" name="email_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="insertar_clientes">
                    <input type="hidden" name="id_cliente" value=0>
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">insertar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>
        </div>
    </div>
</div>
</div>

</html> -->