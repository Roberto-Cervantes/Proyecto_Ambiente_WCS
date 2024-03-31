<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    ?>
</head>

<div class="modal fade" id="ver<?php echo $row['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h3 class="modal-title" id="exampleModalLabel">Ver Registro del Cliente
                    <?php echo $row['nombre']; ?></h3>
            </div>
            <div class="modal-body">

                <form action="../DAL/funciones_clientes.php" method="POST">

                    <div class="row">
                    <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                    <label for="id_cliente">Id Cliente</label>
                                    <input type="text" id="id_cliente" class="form-control" placeholder="0">
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="nombre" class="form-label">Nombre del Cliente</label>
                                <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['nombre']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="apellido" class="form-label">Apellido del Cliente</label>
                                <input type="text" id="apellido_editado" name="apellido_editado" class="form-control" value="<?php echo $row['apellido']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="id_distrito" class="form-label">ID Distrito del Cliente</label>
                                <input type="text" id="id_distrito_editado" name="id_distrito_editado" class="form-control" value="<?php echo $row['id_distrito']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="telefono" class="form-label">Telefono del Cliente</label>
                                <input type="text" id="telefono_editado" name="telefono_editado" class="form-control" value="<?php echo $row['telefono']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <fieldset disabled>
                                <label for="email" class="form-label">Email del Cliente</label>
                                <input type="text" id="email_editado" name="email_editado" class="form-control" value="<?php echo $row['email']; ?>" required>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="accion" value="ver_clientes">
                    <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente'] ?>">
                    <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

</html>