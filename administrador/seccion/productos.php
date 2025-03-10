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

        $fecha = new DateTime();
        $nombreArchivo = ($txtImagen != "") ? $fecha -> getTimestamp() . "_" . $_FILES["txtImagen"]["name"] : "imagen.jpg"; 
        $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

        if ($tmpImagen != ""){
            move_uploaded_file($tmpImagen,"../../img/" . $nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen', $nombreArchivo);
        $sentenciaSQL->execute();
        //echo 'Se presiono agregar';
        break;

    case "modificar":
        $sentenciaSQL = $connectionDb->prepare("UPDATE libros SET nombre=:nombre WHERE id=:id;");
        $sentenciaSQL->bindParam(':nombre', $txtNombre);
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        //echo 'Se presiono modificar';
        break;

    case "cancelar":
        //echo 'Se presiono cancelar';
        break;

    case "Seleccionar":
        //echo 'Se presiono Seleccionar';

        $sentenciaSQL = $connectionDb->prepare("SELECT * FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();
        $libro = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtNombre = $libro['nombre'];
        $txtImagen = $libro['imagen'];

        break;

    case "Borrar":
        
        $sentenciaSQL = $connectionDb->prepare("DELETE FROM libros WHERE id=:id");
        $sentenciaSQL->bindParam(':id', $txtID);
        $sentenciaSQL->execute();

        break;
}

$sentenciaSQL = $connectionDb->prepare("SELECT * FROM libros");
$sentenciaSQL->execute();
$listaLibros = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

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
                    <input type="text" class="form-control" value="<?php echo $txtID ?>" name="txtID" id="txtID" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Nombre: </label>
                    <input type="text" class="form-control" value="<?php echo $txtNombre ?>" name="txtNombre" id="txtNombre" placeholder="Nombre">
                </div>

                <div class="form-group">
                    <label for="txtImagen">Imagen: </label>
                    <?php echo $txtImagen ?>
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
            <?php foreach ($listaLibros as $libros) { ?>
                <tr>
                    <td><?php echo $libros['id']; ?></td>
                    <td><?php echo $libros['nombre']; ?></td>
                    <td><?php echo $libros['imagen']; ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="txtID" id="txtID" value="<?php echo $libros['id']; ?>">
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary">
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include("../template/pie.php"); ?>