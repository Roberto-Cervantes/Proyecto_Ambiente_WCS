<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="borrar<?php echo $row['id_inventario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Registro
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_inventarios.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_inventario">Id Inv.</label>
                                    <input type="text" id="inventario_id_editado" class="form-control" placeholder="<?php echo $row['id_inventario'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="producto_editado" class="form-label">Productos</label>
                                    <select class="form-control form-select form-select-lg mb-3" name="producto_id_editado" aria-label="Large select example">
                                        <?php
                                        $result = getProductos();
                                        $id_prov = $row['id_producto'];
                                        if (count($result[0]) > 0) {
                                            foreach ($result as $rw) {
                                                if ($rw[0] == $id_prov) {
                                                    echo '<option value="' . $rw[0] . '" selected>' . $rw[1] . '</option>';
                                                } else {
                                                    echo '<option value="' . $rw[0] . '">' . $rw[1] . '</option>';
                                                }
                                            }
                                        } else {
                                            echo "No hay datos";
                                        }
                                        ?>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="almacen_editado" class="form-label">Almacenes</label>
                                    <select class="form-control form-select form-select-lg mb-3" name="almacen_id_editado" aria-label="Large select example">
                                        <?php
                                        $result = getAlmacenes();
                                        $id_prov = $row['almacen_id'];
                                        if (count($result[0]) > 0) {
                                            foreach ($result as $rw) {
                                                if ($rw[0] == $id_prov) {
                                                    echo '<option value="' . $rw[0] . '" selected>' . $rw[1] . '</option>';
                                                } else {
                                                    echo '<option value="' . $rw[0] . '">' . $rw[1] . '</option>';
                                                }
                                            }
                                        } else {
                                            echo "No hay datos";
                                        }
                                        ?>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="nombre-ubicacion">Ubicacion</label>
                                    <input type="text" id="nombre_ubicacion" name="nombre_ubicacion" class="form-control" value="<?php echo $row['ubicacion'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="total_cant_disp">Cantidad Disp</label>
                                    <input type="text" id="cant_disp_editado" name="cant_disp_editado" class="form-control" value="<?php echo $row['cant_disp'] ?>">
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="borrar_inventarios">
                    <input type="hidden" name="inventario_id_borrado" value="<?php echo $row['id_inventario'] ?>">
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