<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../INCLUDE/head.php"; ?>
</head>

<div class="modal fade" id="borrar<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Borrar Producto <?php echo $row['id_producto']; ?></h3>
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_productos.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_producto">ID del Producto</label>
                                    <input type="text" id="id_producto" class="form-control" value="<?php echo $row['id_producto']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="proveedor_editado">Proveedor</label>
                                    <input type="text" id="proveedor_editado" name="proveedor_editado" class="form-control" value="<?php echo getProveedorProducto($row['id_proveedor']); ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="nombre_editado">Nombre del Producto</label>
                                    <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['nombre']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="codigo_editado">Código del Producto</label>
                                    <input type="text" id="codigo_editado" name="codigo_editado" class="form-control" value="<?php echo $row['codigo']; ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="descripcion_editado">Descripción</label>
                                    <input type="text" id="descripcion_editado" name="descripcion_editado" class="form-control" value="<?php echo $row['descripcion']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="precio_editado">Precio</label>
                                    <input type="text" id="precio_editado" name="precio_editado" class="form-control" value="<?php echo $row['precio']; ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <!-- Campos ocultos -->
                    <input type="hidden" name="accion" value="borrar_productos">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Borrar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>
