<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="borrar<?php echo $row['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Borrar Registro del Producto<?php echo $row['id_producto']; ?></h3>
                    <?php echo $row['nombre']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_productos.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_producto">Id producto</label>
                                    <input type="text" id="id_producto" class="form-control"  placeholder="<?php echo $row['id_producto'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="proveedor_editado">Proveedor</label>
                                    <input type="text" id="proveedor_editado" name="proveedor_editado" class="form-control" value="<?php echo getProductoProveedor($row['id_proveedor']); ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="codigo" class="form-label">Codigo del Producto</label>
                                    <input type="text" id="codigo_editado" name="codigo_editado" class="form-control" value="<?php echo $row['codigo']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="nombre" class="form-label">Nombre Producto</label>
                                    <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['nombre']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <input type="text" id="descripcion_editado" name="descripcion_editado" class="form-control" value="<?php echo $row['descripcion']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="precio" class="form-label"> Precio</label>
                                    <input type="text" id="precio_editado" name="precio_editado" class="form-control" value="<?php echo $row['precio']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="borrar_productos">
                    <input type="hidden" name="id_producto" value="<?php echo $row['id_producto'] ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Borrar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

</html>