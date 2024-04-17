<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_factura']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Factura del Cliente
                    <?php echo $row['nombre']; ?></h3>
            </div>
            <div class="modal-body">

                <form>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_factura">ID Facturaciones</label>
                                    <input type="text" id="id_factura" class="form-control" placeholder="<?php echo $row['id_factura']; ?>">
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
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="text" id="fecha_editado" name="fecha_editado" class="form-control" value="<?php echo $row['fecha']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="total" class="form-label">Total</label>
                                    <input type="text" id="total_editado" name="total_editado" class="form-control" value="<?php echo $row['total']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" id="estado_editado" name="estado_editado" class="form-control" value="<?php echo $row['Estado']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</html>
