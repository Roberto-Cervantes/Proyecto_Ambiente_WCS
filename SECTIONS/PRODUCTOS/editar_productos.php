<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>
<div class="modal fade" id="editar<?php echo $row['id_productos']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Registro
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_productos.php" method="POST">

                <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_producto">Id Producto</label>
                                    <input type="text" id="id_producto" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_proveedor">Id Proveedor</label>
                                    <input type="text" id="id_proveedor" class="form-control" placeholder="<?php echo $row['id_proveedor']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="codigo" class="form-label">Codigo del Producto</label>
                                <input type="text" id="codigo_insertado" name="codigo_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre Producto</label>
                                    <input type="text" id="nombre_insertado" name="nombre_insertado" class="form-control" value="" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="descripcion" class="form-label">Descripcion</label>
                                        <input id="descripcion_insertado" name="descripcion_insertado" class="form-control" placeholder="0">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="text" id="precio_insertado" name="precio_insertado" class="form-control" value="" required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="editar_productos">
                        <input type="hidden" name="id_producto" value="0">
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