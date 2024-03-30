<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_detalle_number']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Detalle de la Factura del Cliente
                    <?php echo $row['nombre']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_detalles_facturas.php" method="POST">

                    <div class="row">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_detalle_number">Id Detalle Factura</label>
                                    <input type="text" id="id_detalle_numbere" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="factura_id_number" class="form-label">ID Facturaciones</label>
                                <input type="text" id="factura_id_number_editado" name="factura_id_number_editado" class="form-control" value="<?php echo $row['factura_id_number']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="producto_id" class="form-label">ID Producto</label>
                                <input type="text" id="producto_id_editado" name="producto_id_editado" class="form-control" value="<?php echo $row['producto_id']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="text" id="cantidad_editado" name="cantidad_editado" class="form-control" value="<?php echo $row['cantidad']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="precio_unitario" class="form-label">Precio Unitario</label>
                                <input type="text" id="precio_unitario_editado" name="precio_unitario_editado" class="form-control" value="<?php echo $row['precio_unitario']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="ver_clientes">
                    <input type="hidden" name="id_detalle_number" value="<?php echo $row['id_detalle_number'] ?>">
                    <input type="hidden" name="factura_id_number" value="<?php echo $row['factura_id_number']; ?>">
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