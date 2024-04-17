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
                <h3 class="modal-title" id="exampleModalLabel">Insertar Detalle Factura</h3>
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_detalles_facturas.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="factura_id_number" class="form-label">ID Factura</label>
                                <select class="form-control form-select form-select-lg mb-3" name="factura_id_number" id="factura_id_number" aria-label="Large select example">
                                <?php
                                    $result = getFacturaciones();
                                    if (count($result) > 0) {
                                        foreach ($result as $rw) {
                                            echo '<option value="' . $rw[0] . '">' . $rw[1] . '</option>';
                                        }
                                    } else {
                                        echo "No hay datos";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="producto_id" class="form-label">Producto</label>
                                <select class="form-control form-select form-select-lg mb-3" name="producto_id" id="producto_id" aria-label="Large select example">
                                <?php
                                    $result = getProductos();
                                    if (count($result) > 0) {
                                        foreach ($result as $rw) {
                                            echo '<option value="' . $rw[0] . '">' . $rw[3] . '</option>';
                                        }
                                    } else {
                                        echo "No hay datos";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cantidad_insertado" class="form-label">Cantidad</label>
                                <input type="text" id="cantidad_insertado" name="cantidad_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="precio_unitario_insertado" class="form-label">Precio</label>
                                <input type="text" id="precio_unitario_insertado" name="precio_unitario_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="insertar_detalles_facturas">
                    <input type="hidden" name="id_detalle_number" value="0">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Insertar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>
    