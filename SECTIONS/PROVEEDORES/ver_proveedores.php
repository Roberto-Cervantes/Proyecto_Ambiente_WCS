<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_proveedor']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Registro del Proveedor
                    <?php echo $row['nombre']; ?></h3>
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
                                <fieldset disabled>
                                <label for="nombre" class="form-label">Nombre del Proveedor</label>
                                <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['nombre']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="direccion" class="form-label">Direccion</label>
                                <input type="text" id="direccion_editado" name="direccion_editado" class="form-control" value="<?php echo $row['direccion']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="telefono" class="form-label">Telefono del Proveedor</label>
                                <input type="text" id="telefono_editado" name="telefono_editado" class="form-control" value="<?php echo $row['telefono']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="email" class="form-label">Email del Proveedor</label>
                                <input type="text" id="email_editado" name="email_editado" class="form-control" value="<?php echo $row['email']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="ver_proovedores">
                    <input type="hidden" name="id_proveedor" value="<?php echo $row['id_proveedor'] ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

</html>