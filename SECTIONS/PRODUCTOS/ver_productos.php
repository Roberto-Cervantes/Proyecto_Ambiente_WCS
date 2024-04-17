<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Detalles del Producto (ID: <?php echo $row['id_producto']; ?>)</h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_productos.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_producto">ID Producto</label>
                                    <input type="text" id="id_producto" class="form-control" value="<?php echo $row['id_producto']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_proveedor">Proveedor</label>
                                    <input type="text" id="id_proveedor" class="form-control" value="<?php echo getProveedorProducto($row['id_proveedor']); ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="nombre">Nombre del Producto</label>
                                    <input type="text" id="nombre" class="form-control" value="<?php echo $row['nombre']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="codigo">Código del Producto</label>
                                    <input type="text" id="codigo" class="form-control" value="<?php echo $row['codigo']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="descripcion">Descripción</label>
                                    <textarea id="descripcion" class="form-control" rows="3"><?php echo $row['descripcion']; ?></textarea>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="precio">Precio</label>
                                    <input type="text" id="precio" class="form-control" value="<?php echo $row['precio']; ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="accion" value="ver_producto">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">
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
