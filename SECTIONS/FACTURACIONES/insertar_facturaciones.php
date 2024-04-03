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
                <h3 class="modal-title" id="exampleModalLabel">Insertar factura del Cliente
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_facturaciones.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_factura">Id Factura</label>
                                    <input type="text" id="id_factura" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_cliente" class="form-label">ID Cliente</label>
                                    <input type="text" id="id_cliente_insertado" name="id_cliente_insertado" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="mb-3">
                               <label for="fecha" class="form-label">Fecha</label>
                               <input type="date" id="fecha_insertado" name="fecha_insertado" class="form-control" placeholder="YYYY-MM-DD" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="text" id="total_insertado" name="total_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Estado" class="form-label">Estado de Factura</label>
                                <select id="id_distrito_insertado" name="id_distrito_insertado" class="form-control" required>
                                      <option value="1">0</option> 
                                      <option value="1">1</option> 
                                </select>
                            </div>
                        </div>
                       
                    </div>

                    <input type="hidden" name="accion" value="insertar_facturaciones">
                    <input type="hidden" name="id_factura" value=0>
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