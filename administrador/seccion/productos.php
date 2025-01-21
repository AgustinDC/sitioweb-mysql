<?php
include("../template/cabecera.php");
include("../config/db.php");
?>

<?php
$txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : '';
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : '';
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : '';
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : '';

switch ($accion) {
    case "agregar":
        $sentenciaSQL = $connectionDb->prepare("INSERT INTO libros (nombre, imagen) VALUES (:nombre, :imagen);");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':imagen', $txtImagen);
        $sentenciaSQL->execute();
        echo 'Se presiono agregar';
        break;

    case "modificar":
        echo 'Se presiono modificar';
        break;

    case "cancelar":
        echo 'Se presiono cancelar';
        break;
}
?>

<div class="col-md-5">

    <div class="card mt-3">
        <div class="card-header">
            Datos del Libro
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtID">ID: </label>
                    <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre">
                </div>

                <div class="form-group">
                    <label for="txtImagen">Imagen: </label>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen">
                </div>

                <div class="btn-group mt-3" role="group" aria-label="">
                    <button type="submit" name="accion" value="agregar" class="btn btn-success"> Agregar </button>
                    <button type="submit" name="accion" value="modificar" class="btn btn-warning"> Modificar </button>
                    <button type="submit" name="accion" value="cancelar" class="btn btn-info"> Cancelar </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-7">

    <table class="table table-sm mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Aprende php</td>
                <td>imagen.jpg</td>
                <td>agregar | Borrar</td>
            </tr>
        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>