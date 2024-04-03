<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_factura']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Factura del Cliente
                    <?php echo $row['nombre']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_facturaciones.php" method="POST">

                    <div class="row">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_factura">Id Facturaciones</label>
                                    <input type="text" id="id_factura" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="cliente_id" class="form-label">ID Cliente</label>
                                <input type="text" id="cliente_id_editado" name="cliente_id_editado" class="form-control" value="<?php echo $row['cliente_id']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="text" id="fecha_editado" name="fecha_editado" class="form-control" value="<?php echo $row['fecha']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="toatl" class="form-label">Total</label>
                                <input type="text" id="total_editado" name="total_editado" class="form-control" value="<?php echo $row['total']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" id="estado_editado" name="estado_editado" class="form-control" value="<?php echo $row['Estado']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="ver_clientes">
                    <input type="hidden" name="id_factura" value="<?php echo $row['id_factura'] ?>">
                    <input type="hidden" name="cliente_id" value="<?php echo $row['cliente_id']; ?>">
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