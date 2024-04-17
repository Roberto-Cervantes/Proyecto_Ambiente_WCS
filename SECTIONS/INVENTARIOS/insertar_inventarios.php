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
                                    <label for="id_inventario">Id Inv.</label>
                                    <input type="text" id="id_inventario" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="producto_insertado" class="form-label">Productos</label>
                                <select class="form-control form-select form-select-lg mb-3" name="producto_id" aria-label="Large select example">
                                    <?php
                                    $result = getProductos();
                                    if (count($result[0]) > 0) {
                                        foreach ($result as $rw) {
                                            echo '<option value="' . $rw[0] . '">' . $rw[1] . '</option>';
                                        }
                                    } else {
                                        echo "No hay datos";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="almacen_insertado" class="form-label">Almacenes</label>
                                <select class="form-control form-select form-select-lg mb-3" name="almacen_id" aria-label="Large select example">
                                    <?php
                                    $result = getAlmacenes();
                                    if (count($result[0]) > 0) {
                                        foreach ($result as $rw) {
                                            echo '<option value="' . $rw[0] . '">' . $rw[1] . '</option>';
                                        }
                                    } else {
                                        echo "No hay datos";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre-ubicacion">Ubicacion</label>
                                <input type="text" id="ubicacion" name="ubicacion" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="total_cant_disp">Cantidad Disp</label>
                                <input type="text" id="cant_disp" name="cant_disp" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="insertar_inventarios">
                    <input type="hidden" name="id_inventario" value=0>
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