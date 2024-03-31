<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../INCLUDE/head.php"; ?>
</head>

<div class="modal fade" id="borrar<?php echo $row['id_compra']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Borrar Compra <?php echo $row['id_compra']; ?></h3>
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_compras.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_compra">ID de Compra</label>
                                    <input type="text" id="id_compra" class="form-control" value="<?php echo $row['id_compra']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="producto_editado">Producto</label>
                                    <input type="text" id="producto_editado" name="producto_editado" class="form-control" value="<?php echo getProductoCompra($row['id_producto']); ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="fecha_editado">Fecha</label>
                                    <input type="text" id="fecha_editado" name="fechas_editado" class="form-control" value="<?php echo $row['fechas']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="estado_editado">Estado</label>
                                    <input type="text" id="estado_editado" name="estado_editado" class="form-control" value="<?php echo ($row['estado'] == 1) ? 'Activo' : 'Inactivo'; ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                  
                 
                    <!-- Campos ocultos -->
                    <input type="hidden" name="accion" value="borrar_compras">
                    <input type="hidden" name="id_compra" value="<?php echo $row['id_compra']; ?>">
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

