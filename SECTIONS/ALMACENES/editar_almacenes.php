<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="editar<?php echo $row['id_almacen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Registro
                    <?php echo $row['ubicacion']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_almacenes.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">

                                <fieldset disabled>
                                    <label for="id_almacenes">Id Almacen</label>
                                    <input type="text" id="id_almacenes" class="form-control" placeholder="<?php echo $row['id_almacen'] ?>">
                                </fieldset>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Almacen</label>
                                <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['ubicacion']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="editar_almacenes">
                    <input type="hidden" name="id_almacenes" value="<?php echo $row['id_almacen'] ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['ubicacion']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>
        </div>
    </div>
</div>
</div>

</html>