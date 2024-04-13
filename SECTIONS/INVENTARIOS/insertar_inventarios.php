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
                                    <label for="id_inventario">Id Inventario</label>
                                    <input type="text" id="id_inventario_editado" class="form-control" placeholder="<?php echo $row['id_inventario'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="almacen_id" class="form-label">Id Almacén</label>
                                    <input type="text" id="almacen_id_editado" name="almacen_id_editado" class="form-control" value="<?php echo $row['almacen_id']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="Cantidad_disponible" class="form-label">Cantidad disponible</label>
                                    <input type="text" id="Cantidad_disponible" name="Cantidad_disponible" class="form-control" 
                                    value="<?php echo getInventarios($row['Cantidad_disponible']); ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="producto_id" class="form-label">Productos</label>
                                    <input type="text" id="producto_id" name="producto_id" class="form-control" 
                                    value="<?php echo getInventarios($row['producto_id']); ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    
                   
                                    <?php



                                    $result = getInventarios();
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
                    </div>
                    <input type="hidden" name="accion" value="insertar_inventarios">
                    <input type="hidden" name="id_inventarios" value="<?php echo $row['id_inventarios'] ?>">
                    <input type="hidden" name="Cantidad_disponible" value="<?php echo $row['Cantidad_disponible']; ?>">
                    <input type="hidden" name="producto_id" value="<?php echo $row['producto_id']; ?>">
                    <input type="hidden" name="Ubicacion" value="<?php echo $row['Ubicacion']; ?>">
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