<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_distrito']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Registro
                    <?php echo $row['nombre']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_distritos.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_distrito">Id Distrito</label>
                                    <input type="text" id="id_distrito" class="form-control" 
                                    placeholder="<?php echo $row['id_distrito'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="nombre" class="form-label">Nombre Distrito</label>
                                    <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" 
                                    value="<?php echo $row['nombre']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="direccion" class="form-label">Direccion</label>
                                    <input type="text" id="nombre_direccion" name="nombre_direccion" class="form-control" 
                                    value="<?php echo $row['direccion']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="nombre" class="form-label">Canton</label>
                                    <input type="text" id="canton_insertado" name="canton_insertado" class="form-control" 
                                    value="<?php echo getCanton($row['canton_id']); ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="ver_distritos">
                    <input type="hidden" name="id_distrito" value="<?php echo $row['id_distrito'] ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <input type="hidden" name="canton" value="<?php echo $row['canton_id']; ?>">
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