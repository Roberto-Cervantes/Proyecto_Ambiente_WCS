<!DOCTYPE html>
<html lang="en">
<?php
require_once "../DAL/funciones_detalles_facturas.php";
?>

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
                                <label for="id_detalle_number" class="form-label">ID Detalle Factura</label>
                                <input type="text" id="id_detalle_number" name="id_detalle_number" class="form-control" value="<?php echo $row['id_detalle_number']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="factura_id_number">ID Factura</label>
                                <select class="form-control form-select form-select-lg mb-3" name="factura_id_number" id="factura_id_number" aria-label="Large select example">
                                <?php
                                    $result = getFacturaciones();
                                    if (count($result) > 0) {
                                        foreach ($result as $rw) {
                                            echo '<option value="' . $rw[0] . '"';
                                            if ($rw[0] == $row['factura_id_number']) echo ' selected';
                                            echo '>' . $rw[0] . '</option>';
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
                                            echo '<option value="' . $rw[0] . '"';
                                            if ($rw[0] == $row['producto_id']) echo ' selected';
                                            echo '>' . $rw[3] . '</option>';
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
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="text" id="cantidad" name="cantidad" class="form-control" value="<?php echo $row['cantidad']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="precio_unitario" class="form-label">Precio</label>
                                <input type="text" id="precio_unitario" name="precio_unitario" class="form-control" value="<?php echo $row['precio_unitario']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="editar_detalles_facturas">
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</html>



