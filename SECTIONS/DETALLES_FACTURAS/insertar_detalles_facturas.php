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
                <h3 class="modal-title" id="exampleModalLabel">Insertar Detalle Factura
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_detalles_facturas.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_detalle_number">ID Detalle</label>
                                    <input type="text" id="id_detalle_number" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="factura_id_number">ID Factura</label>
                                    <input type="text" id="factura_id_number" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="producto_id">ID Producto</label>
                                    <input type="text" id="producto_id" class="form-control" placeholder="0">
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
                    </div>

                    <input type="hidden" name="accion" value="insertar_detalles_facturas">
                    <input type="hidden" name="id_detalle_number" value=0>
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">insertar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>


            </form>
        </div>
    </div>
</div>
</div>

</html> 