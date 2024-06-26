<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="borrar<?php echo $row['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Borrar Registro del Cliente
                    <?php echo $row['id_cliente']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_clientes.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_cliente">Id Cliente</label>
                                    <input type="text" id="id_cliente" class="form-control" value="<?php echo $row['id_cliente']; ?>" required>
                                </fieldset>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="nombre" class="form-label">Nombre Cliente</label>
                                    <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['nombre']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="borrar_clientes">
                    <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente'] ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Borrar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>
        </div>
    </div>
</div>
</div>

</html>