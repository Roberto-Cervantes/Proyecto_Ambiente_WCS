<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../INCLUDE/head.php"; ?>
</head>

<div class="modal fade" id="borrar<?php echo $row['id_detalle']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Borrar Detalle de Compra <?php echo $row['id_detalle']; ?></h3>
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_detallecompras.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_detalle">ID de Detalle de Compra</label>
                                    <input type="text" id="id_detalle" class="form-control" value="<?php echo $row['id_detalle']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="compra_editado">ID de Compra</label>
                                    <input type="text" id="compra_editado" name="compra_editado"class="form-control"  value="<?php echo getCompraDetalle($row['compra_id']); ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="cantidad_editada">Cantidad</label>
                                    <input type="text" id="cantidad_editada" name="cantidad_editada" class="form-control" value="<?php echo $row['cantidad']; ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="precio_unitario_editado">Precio Unitario</label>
                                    <input type="text" id="precio_unitario_editado" name="precio_unitario_editado" class="form-control" value="<?php echo $row['precio_unitario']; ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                 
                    <!-- Campos ocultos -->
                    <input type="hidden" name="accion" value="borrar_detallecompras">
                    <input type="hidden" name="id_detalle" value="<?php echo $row['id_detalle']; ?>">
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

