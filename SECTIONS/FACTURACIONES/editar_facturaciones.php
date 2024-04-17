
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
                <?php echo $row['nombre']; ?></h3>
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
                                <label for="fecha_editado" class="form-label">Fecha Factura</label>
                                <input type="date" id="fecha_editado" name="fecha_editado" class="form-control" value="<?php echo $row['fecha'] ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="total_editado" class="form-label">Total de la Factura</label>
                                <input type="text" id="total_editado" name="total_editado" class="form-control" value="<?php echo $row['total'] ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="Estado_editado" class="form-label">Estado Factura</label>
                                <select id="Estado_editado" name="Estado_editado" class="form-control" required>
                                    <option value="Pagado" <?php if($row['Estado'] == "Pagado") echo "selected"; ?>>Pagado</option> 
                                    <option value="Pendiente" <?php if($row['Estado'] == "Pendiente") echo "selected"; ?>>Pendiente</option> 
                                </select>
                            </div>
                        </div>
                        <!-- Información del Cliente -->
                        <div class="col-sm-12">
                            <h4>Información del Cliente</h4>
                            <p><strong>Nombre:</strong> <?php echo getNombreCliente($row['cliente_id']); ?></p>
                            <p><strong>Apellidos:</strong> <?php echo getApellidosCliente($row['cliente_id']); ?></p>
                            <!-- Agrega más información del cliente si es necesario -->
                        </div>
                    </div>
                    <input type="hidden" name="accion" value="editar_facturaciones">
                    <input type="hidden" name="id_factura" value="<?php echo $row['id_factura'] ?>">
                    <br>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</html>
