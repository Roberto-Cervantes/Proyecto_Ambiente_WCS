<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="editar<?php echo $row['id_compra']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Compra</h3>
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_compras.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id_compra" class="form-label">Id Compra</label>
                                <input type="text" id="id_compra" class="form-control"
                                    value="<?php echo $row['id_compra']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="producto_insertado" class="form-label">Producto</label>
                                <select class="form-control" id="producto_insertado" name="producto_insertado" required>
                                    <option value="" disabled>Selecciona un producto</option>
                                    <?php
                                    $productos = getProductos(); // Obtener todos los productos
                                    foreach ($productos as $producto) {
                                        $selected = ($producto['id_producto'] == $row['id_producto']) ? 'selected' : '';
                                        echo '<option value="' . $producto['id_producto'] . '" ' . $selected . '>' . $producto['nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="fechas_insertado" class="form-label">Fecha</label>
                                <input type="date" id="fechas_insertado" name="fechas_insertado" class="form-control" 
                                    value="<?php echo $row['fechas']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="estado_insertado" class="form-label">Estado</label>
                                <select class="form-control" id="estado_insertado" name="estado_insertado" required>
                                    <option value="1" <?php if ($row['estado'] == 1) echo 'selected'; ?>>Activo</option>
                                    <option value="0" <?php if ($row['estado'] == 0) echo 'selected'; ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="accion" value="editar_compras">
                    <input type="hidden" name="id_compra" value="<?php echo $row['id_compra']; ?>">
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
