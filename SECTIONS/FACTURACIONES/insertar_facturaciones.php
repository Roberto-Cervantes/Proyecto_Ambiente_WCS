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
                <h3 class="modal-title" id="exampleModalLabel">Insertar factura del Cliente</h3>
            </div>
            <div class="modal-body">
                <form action="../DAL/funciones_facturaciones.php" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="cliente_insertado" class="form-label">Cliente</label>
                                <select class="form-control form-select form-select-lg mb-3" name="cliente_insertado" id="cliente_insertado" aria-label="Large select example">
                                    <?php
                                    $result = getClientes();
                                    if (count($result) > 0) {
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
                                <label for="fecha_insertado" class="form-label">Fecha</label>
                                <input type="date" id="fecha_insertado" name="fecha_insertado" class="form-control" placeholder="YYYY-MM-DD" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="total_insertado" class="form-label">Total</label>
                                <input type="text" id="total_insertado" name="total_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Estado_insertado" class="form-label">Estado de Factura</label>
                                <select id="Estado_insertado" name="Estado_insertado" class="form-control" required>
                                      <option value="Pagado">Pagado</option> 
                                      <option value="Pendiente">Pendiente</option> 
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="accion" value="insertar_facturaciones">
                    <input type="hidden" name="id_factura" value="0">
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

</html>
