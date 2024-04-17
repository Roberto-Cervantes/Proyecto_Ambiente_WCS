<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once "../INCLUDE/head.php";
    
    ?>
</head>

<body>
    <div class="modal fade" id="insertar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h3 class="modal-title" id="exampleModalLabel">Nuevo Producto</h3>
                </div>
                <div class="modal-body">
                    <form action="../DAL/funciones_productos.php" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="id_producto" class="form-label">ID Producto</label>
                                    <input type="text" id="id_producto" class="form-control" placeholder="0" disabled>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label for="proveedor_insertado" class="form-label">Proveedor</label>
                                    <select class="form-control" id="proveedor_insertado" name="proveedor_insertado" required>
                                        <option value="" selected disabled>Selecciona un proveedor</option>
                                        <?php
                                        $proveedores = getProveedores(); // Obtener la lista de proveedores
                                        foreach ($proveedores as $proveedor) {
                                            echo '<option value="' . $proveedor['id_proveedor'] . '">' . $proveedor['nombre'] . '</option>'; // Mostrar el nombre del proveedor en la lista
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="nombre_insertado" class="form-label">Nombre del Producto</label>
                                    <input type="text" id="nombre_insertado" name="nombre_insertado" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="codigo_insertado" class="form-label">Código del Producto</label>
                                    <input type="text" id="codigo_insertado" name="codigo_insertado" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="descripcion_insertado" class="form-label">Descripción</label>
                                    <input id="descripcion_insertado" name="descripcion_insertado" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="precio_insertado" class="form-label">Precio</label>
                                    <input type="text" id="precio_insertado" name="precio_insertado" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="accion" value="insertar_productos">
                        <input type="hidden" name="id_producto" value="0">
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
</body>

</html>
