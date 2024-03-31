
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="editar<?php echo $row['id_detalle_number']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Detalle Factura
                    <?php echo $row['factura_id_number']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_detalles_facturas.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_detalle_number">ID Detalle Factura</label>
                                    <input type="text" id="id_detalle_number" class="form-control" placeholder="<?php echo $row['id_detalle_number'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="factura_id_number">ID Factura</label>
                                    <input type="text" id="factura_id_number" class="form-control" placeholder="<?php echo $row['factura_id_number'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="producto_id">ID Procucto</label>
                                    <input type="text" id="producto_id" class="form-control" placeholder="<?php echo $row['producto_id'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="text" id="cantidad_insertado" name="cantidad_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="precio_unitario" class="form-label">Precio</label>
                                <input type="text" id="precio_unitario_insertado" name="precio_unitario_insertado" class="form-control" value="" required>
                            </div>
                    </div>

                    <input type="hidden" name="accion" value="editar_detalles_facturas">
                    <input type="hidden" name="id_detalle_number" value="<?php echo $row['id_detalle_number'] ?>">
                    <input type="hidden" name="factura_id_number" value="<?php echo $row['factura_id_number']; ?>">
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

