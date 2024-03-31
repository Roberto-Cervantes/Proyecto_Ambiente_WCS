<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    require_once "../DAL/funciones_compras.php";
    ?>
</head>

<body>
    <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Nueva Compra</h3>
                </div>
                <div class="modal-body">
                    <form action="../DAL/funciones_compras.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="id_proveedor">Id Compra</label>
                                        <input type="text" id="id_proveedor" class="form-control" placeholder="0">
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="producto_insertado" class="form-label">Producto</label>
                                    <select class="form-control" id="producto_insertado" name="producto_insertado" required>
                                        <option value="" selected disabled>Selecciona un producto</option>
                                        <?php
                                        $productos = getProductos(); 
                                        foreach ($productos as $producto) {
                                            echo '<option value="' . $producto['id_producto'] . '">' . $producto['nombre'] . '</option>'; 
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="fechas_insertado" class="form-label">Fecha</label>
                                    <input type="date" id="fechas_insertado" name="fechas_insertado" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="estado_insertado" class="form-label">Estado</label>
                                    <select class="form-control" id="estado_insertado" name="estado_insertado" required>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="insertar_compras">
                        <input type="hidden" name="id_compra" value="0">
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
