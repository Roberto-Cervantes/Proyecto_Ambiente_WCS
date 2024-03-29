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

                <form action="../DAL/funciones_almacenes.php" method="POST">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_almacenes">Id Almacen</label>
                                    <input type="text" id="id_almacenes" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre Almacen</label>
                                <input type="text" id="nombre_insertado" name="nombre_insertado" class="form-control" value="" required>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="insertar_almacenes">
                    <input type="hidden" name="id_almacenes" value=0>
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