<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    require_once "../DAL/funciones_detallecompras.php";
    ?>
</head>

<body>
    <div class="modal fade" id="editar<?php echo $row['id_detalle']; ?>" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Editar Detalle de Compra</h3>
                </div>
                <div class="modal-body">
                    <form action="../DAL/funciones_detallecompras.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="id_detalle" class="form-label">ID Detalle</label>
                                    <input type="text" id="id_detalle" class="form-control" value="<?php echo $row['id_detalle']; ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="compra_insertado" class="form-label">Compra</label>
                                    <select class="form-control" id="compra_insertado" name="compra_insertado" required>
                                        <option value="" selected disabled>Selecciona una compra</option>
                                        <?php
                                        $compras = getCompras(); // Obtener todas las compras
                                        foreach ($compras as $compra) {
                                            echo '<option value="' . $compra['id_compra'] . '">ID: ' . $compra['id_compra'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="cantidad_insertado" class="form-label">Cantidad</label>
                                    <input type="number" id="cantidad_insertado" name="cantidad_insertado" class="form-control" value="<?php echo $row['cantidad']; ?>"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="precio_unitario_insertado" class="form-label">Precio Unitario</label>
                                    <input type="number" id="precio_unitario_insertado" name="precio_unitario_insertado" class="form-control" value="<?php echo $row['precio_unitario']; ?>"
                                        required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="editar_detallecompras">
                        <input type="hidden" name="id_detalle" value="<?php echo $row['id_detalle']; ?>">
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
</body>

</html>
