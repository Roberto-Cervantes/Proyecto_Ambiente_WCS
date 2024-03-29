<!DOCTYPE html>
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
                <h3 class="modal-title" id="exampleModalLabel">Insertar Registro del Proveedor
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_proveedores.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_proveedor">Id Proveedor</label>
                                    <input type="text" id="id_proveedor" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Proveedor</label>
                                <input type="text" id="nombre_insertado" name="nombre_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Direccion del Proveedor</label>
                                <input type="text" id="direccion_insertado" name="direccion_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono del Proveedor</label>
                                <input type="text" id="telefono_insertado" name="telefono_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email del Proveedor</label>
                                <input type="email" id="email_insertado" name="email_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="insertar_proveedores">
                    <input type="hidden" name="id_proveedor" value=0>
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Insertar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>
        </div>
    </div>
</div>
</div>

</html>