<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_almacen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Registro
                    <?php echo $row['ubicacion']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_almacenes.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_almacen">Id Almacen</label>
                                    <input type="text" id="id_almacen" class="form-control" placeholder="<?php echo $row['id_almacen'] ?>">
                                </fieldset>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="nombre" class="form-label">Nombre Almacen</label>
                                <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['ubicacion']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="ver_almacenes">
                    <input type="hidden" name="id_almacen" value="<?php echo $row['id_almacen'] ?>">
                    <input type="hidden" name="ubicacion" value="<?php echo $row['ubicacion']; ?>">
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