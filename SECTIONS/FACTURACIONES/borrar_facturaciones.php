<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="borrar<?php echo $row['id_factura']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Borrar Factura del Cliente
                <?php echo $row['nombre']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_facturaciones.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_factura">ID Factura</label>
                                    <input type="text" id="id_factura" class="form-control" placeholder="<?php echo $row['id_factura'] ?>">
                                </fieldset>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cliente_editado" class="form-label">Cliente</label>
                                <select class="form-control form-select form-select-lg mb-3" name="cliente_editado" id="cliente_editado" aria-label="Large select example">
                                    <?php
                                    $result = getClientes();
                                    if (count($result) > 0) {
                                        foreach ($result as $rw) {
                                            echo '<option value="' . $rw[0] . '"';
                                            if ($rw[0] == $row['cliente_id']) echo ' selected';
                                            echo '>' . $rw[1] . '</option>';
                                        }
                                    } else {
                                        echo "No hay datos";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="borrar_facturaciones">
                    <input type="hidden" name="id_factura" value="<?php echo $row['id_factura'] ?>">
                    <input type="hidden" name="cliente_id" value="<?php echo $row['cliente_id']; ?>">
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
