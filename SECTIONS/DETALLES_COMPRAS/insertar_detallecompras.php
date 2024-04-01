<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    require_once "../DAL/funciones_detallecompras.php";
    ?>
</head>

<body>
    <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Nuevo Detalle de Compra</h3>
                </div>
                <div class="modal-body">
                    <form action="../DAL/funciones_detallecompras.php" method="POST">
                        <div class="row">
                        <div class="col-sm-6">
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="id_detalle">Id Detalle</label>
                                        <input type="text" id="id_detalle" class="form-control" placeholder="0">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="compra_id" class="form-label">Compra</label>
                                    <select class="form-control" id="compra_id" name="compra_id" required>
                                        <option value="" selected disabled>Selecciona una compra</option>
                                        <?php
                                        $compras = getCompras(); 
                                        foreach ($compras as $compra) {
                                            echo '<option value="' . $compra['id_compra'] . '">ID: ' . $compra['id_compra'] . '</option>'; 
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="cantidad_insertada" class="form-label">Cantidad</label>
                                    <input type="number" id="cantidad_insertada" name="cantidad_insertada" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="precio_unitario_insertado" class="form-label">Precio Unitario</label>
                                    <input type="number" id="precio_unitario_insertado" name="precio_unitario_insertado" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="insertar_detallecompras">
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
</body>

</html>
