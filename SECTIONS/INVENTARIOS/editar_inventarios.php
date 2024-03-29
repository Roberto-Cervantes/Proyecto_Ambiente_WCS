<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>
<div class="modal fade" id="editar<?php echo $row['id_inventarios']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Registro
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_inventarios.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_inventarios">Id Inventario</label>
                                    <input type="text" id="id_inventarios" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre inventario</label>
                                <input type="text" id="nombre_insertado" name="nombre_editado" class="form-control" value="<?php echo $row['nombre']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Almacen</label>
                                <select class="form-control form-select form-select-lg mb-3" name="almacen_editado" aria-label="Large select example">
                                    <?php
                                    $result = getinventarios();
                                    $id_prov = getIdalmacenesInventarios($row['id_ivnentarios']);
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
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="accion" value="editar_inventarios">
                    <input type="hidden" name="id_inventarios" value=<?php echo $row['id_inventarios']; ?>>
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

</html>