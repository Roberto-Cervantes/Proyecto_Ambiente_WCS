<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="editar<?php echo $producto['id_producto']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Producto</h3>
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_productos.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="id_producto" class="form-label">Id Producto</label>
                                <input type="text" id="id_producto" class="form-control"
                                    value="<?php echo $producto['id_producto']; ?>" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="id_proveedor_insertado" class="form-label">Proveedor</label>
                                <select class="form-control" id="id_proveedor_insertado" name="id_proveedor_insertado" required>
                                    <option value="" disabled>Selecciona un proveedor</option>
                                    <?php
                                    $proveedores = getProveedores(); // Obtener todos los proveedores
                                    foreach ($proveedores as $proveedor) {
                                        $selected = ($proveedor['id_proveedor'] == $producto['id_proveedor']) ? 'selected' : '';
                                        echo '<option value="' . $proveedor['id_proveedor'] . '" ' . $selected . '>' . $proveedor['nombre'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="codigo_insertado" class="form-label">Código del Producto</label>
                                <input type="text" id="codigo_insertado" name="codigo_insertado" class="form-control"
                                    value="<?php echo $producto['codigo']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre_insertado" class="form-label">Nombre Producto</label>
                                <input type="text" id="nombre_insertado" name="nombre_insertado" class="form-control"
                                    value="<?php echo $producto['nombre']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="descripcion_insertado" class="form-label">Descripción</label>
                                <input id="descripcion_insertado" name="descripcion_insertado" class="form-control"
                                    value="<?php echo $producto['descripcion']; ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="precio_insertado" class="form-label">Precio</label>
                                <input type="text" id="precio_insertado" name="precio_insertado" class="form-control"
                                    value="<?php echo $producto['precio']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="accion" value="editar_productos">
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>">
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

