<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_detalle']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Detalles del Detalle de Compra (ID: <?php echo $row['id_detalle']; ?>)</h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_detallecompras.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_detalle">ID Detalle</label>
                                    <input type="text" id="id_detalle" class="form-control" value="<?php echo $row['id_detalle']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="compra_id">ID Compra</label>
                                    <input type="text" id="compra_id" name="compra_id" class="form-control" value="<?php echo getCompraDetalle($row['compra_id']); ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="producto_editado">Nombre del Producto</label>
                                    <input type="text" id="producto_editado" name="producto_editado" class="form-control" value="<?php echo getProductoDetalleCompra($row['compra_id']); ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="cantidad_editada">Cantidad</label>
                                    <input type="text" id="cantidad_editada" name="cantidad_editada" class="form-control" value="<?php echo $row['cantidad']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="precio_unitario">Precio Unitario</label>
                                    <input type="text" id="precio_unitario" name="precio_unitario" class="form-control" value="<?php echo $row['precio_unitario']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="monto_total">Monto Total</label>
                                    <input type="text" id="monto_total" name="monto_total" class="form-control" value="<?php echo calcularTotal($row['precio_unitario'], $row['cantidad']); ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="accion" value="ver_detallecompras">
                    <input type="hidden" name="id_detalle" value="<?php echo $row['id_detalle']; ?>">
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>

