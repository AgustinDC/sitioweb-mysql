<?php include("../template/cabecera.php"); ?>

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
                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="ID">
                </div>

                <div class="form-group">
                    <label for="txtNombre">Imagen: </label>
                    <input type="file" class="form-control" name="txtImagen" id="txtNombre" placeholder="ID">
                </div>

                <div class="btn-group mt-3" role="group" aria-label="">
                    <button type="button" class="btn btn-success"> Agregar </button>
                    <button type="button" class="btn btn-warning"> Modificar </button>
                    <button type="button" class="btn btn-info"> Cancelar </button>
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