<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Insertar Registro
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_inventarios.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_inv">Id Inventario</label>
                                    <input type="text" id="id_inventario" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="product" class="form-label">Id Producto</label>
                                <input type="text" id="producto_id_insertado" name="producto_id_insertado" 
                                class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="almacen" class="form-label">Id Almacén</label>
                                <input type="text" id="almacen_id_insertado" name="almacen_id_insertado" 
                                class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Ubicacion" class="form-label">Ubicacion</label>
                                <input type="text" id="Ubicacion_insertado" name="Ubicacion_insertado" 
                                class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Cant" class="form-label">Cantidad disponible</label>
                                <input type="text" id="Cantidad_insertado" name="Cantidad_insertado" 
                                class="form-control" value="" required>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <input type="hidden" name="accion" value="insertar_inventarios">
        <input type="hidden" name="id_inventario" value="0">
        <br>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">insertar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>

</html>