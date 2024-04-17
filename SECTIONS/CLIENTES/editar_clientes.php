<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../INCLUDE/head.php"; ?>
</head>

<body>

    <div class="modal fade" id="editar<?php echo $row['id_cliente']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Editar Registro del cliente
                        <?php echo $row['nombre']; ?></h3>
                </div>
                <div class="modal-body">
                    <form action="../DAL/funciones_clientes.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <fieldset disabled>
                                        <label for="id_cliente">Id Cliente</label>
                                        <input type="text" id="id_cliente" class="form-control" value="<?php echo $row['id_cliente']; ?>" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del Cliente</label>
                                    <input type="text" id="nombre_editado" name="nombre_editado" class="form-control" value="<?php echo $row['nombre']; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos del Cliente</label>
                                    <input type="text" id="apellidos_editado" name="apellidos_editado" class="form-control" value="<?php echo $row['apellidos']; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email del Cliente</label>
                                    <input type="email" id="email_editado" name="email_editado" class="form-control" value="<?php echo $row['email']; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Telefono del Cliente</label>
                                    <input type="text" id="telefono_editado" name="telefono_editado" class="form-control" value="<?php echo $row['telefono']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Provincia</label>
                                    <select id="slt-provincias" name="provincia_editado" class="form-control" required>
                                        <option value="">Seleccione una provincia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Canton</label>
                                    <select id="slt-cantones" name="canton_editado" class="form-control" required>
                                        <option value="">Seleccione un canton<?php echo $row['nombre_canton']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Distrito</label>
                                    <select id="slt-distritos" name="distrito_editado" class="form-control" required>
                                        <option value="">Seleccione un distrito<?php echo $row['nombre_distrito']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección del Cliente</label>
                                    <input type="text" id="direccion_editado" name="direccion_editado" class="form-control" value="<?php echo $row['direccion']; ?>" required>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="accion" value="editar_clientes">
                        <input type="hidden" name="id_cliente" value="<?php echo $row['id_cliente'] ?>">
                        <input type="hidden" name="nombre" value="<?php echo $row['nombre']; ?>">
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

    <script src="../INCLUDE/js/distribucion-cr.js"></script>
    <script src="../INCLUDE/js/formulario.js"></script>

</body>

</html>
