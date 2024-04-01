
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="editar<?php echo $row['id_factura']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Editar Factura del cliente
                    <?php echo $row['cliente_id']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_facturaciones.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_factura">Id factura</label>
                                    <input type="text" id="id_factura" class="form-control" placeholder="<?php echo $row['id_factura'] ?>">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="cliente_id">Id Cliente</label>
                                    <input type="text" id="cliente_id" class="form-control" placeholder="<?php echo $row['cliente_id'] ?>">
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha Factura</label>
                                <input type="datetime" id="fecha_insertado" name="fecha_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="total" class="form-label">Total de la Factura</label>
                                <input type="text" id="total_insertado" name="total_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Estado" class="form-label">Estado Factura</label>
                                <input type="checkbox" id="Estado_insertado" name="Estado_insertado" class="form-control" value="0" required>
                                <input type="checkbox" id="Estado_insertado" name="Estado_insertado" class="form-control" value="1" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="editar_facturaciones">
                    <input type="hidden" name="id_factura" value="<?php echo $row['id_factura'] ?>">
                    <input type="hidden" name="cliente_id" value="<?php echo $row['cliente_id']; ?>">
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

