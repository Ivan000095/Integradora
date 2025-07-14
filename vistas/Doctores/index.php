<?php
    include('../../modelos/Doctor.php');
    $doctores=Doctor::lista();
?>

<html lang="en">
    <?php  include('../../head.php') ?>
    <body>
        <?php  include('../../menu.php') ?>

        <div id="contenido" class="">
            <br>
        <h1 id="titulo">Doctores</h1>
        <a href="agregar.php" class="btn btn-outline-dark" id="btnadd"><i class="bi bi-person-add"></i> Agregar</a>
        <br>
        <table class="table table-striped" id="tabla-doctor">
          <tr>
            <th>Id</th>
            <th>Especialidad</th>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Correo</th>
            <th>Foto</th>
            <th>Teléfono</th>
            <th>Fecha de nacimiento</th>
            <th>Idiomas</th>
            <th>Descripción</th>
            <th>Género</th>
            <th>Costo</th>
            <th>Horario</th>
            <th>Días laborales</th>
            <th>Ubicación</th>
            <th>Acciones</th>
          </tr>
          <?php
          foreach ($doctores as $d){
          ?>
          <tr>
              <td><?php echo $d->idDoctor; ?></td>
              <td><?php echo $d->nombreespe; ?></td>
              <td><?php echo $d->nombre; ?></td>
              <td><?php echo $d->cedula; ?></td>
              <td><?php echo $d->correo; ?></td>
              <td><img src="../../<?php echo $d->foto; ?>" alt="Foto de <?php echo $d->nombre; ?>" width="100rem"></td>
              <td><?php echo $d->telefono; ?></td>
              <td><?php echo $d->fecha; ?></td>
              <td><?php echo $d->idiomas; ?></td>
              <td><?php echo $d->descripcion; ?></td>
              <td><?php echo $d->genero; ?></td>
              <td>$<?php echo $d->costo; ?></td>
              <td><?php echo $d->horario; ?></td>
              <td><?php echo $d->diaslab; ?></td>
              <td><?php echo $d->ubicacion; ?></td>
              <td><div class="justify-content-center">
                                <a href="edit.php?id=<?php echo $d->idDoctor; ?>">
                                    <button class="btn btn-sm btn-warning mb-1"><i class="bi bi-pencil-square"></i> Editar</button>
                                </a>
                                <form action="destroy.php?id=<?php echo $d->idDoctor; ?>" method="POST" id="form<?php echo $d->idDoctor; ?>" class="inline">
                                    <button type="button" class="btn btn-sm btn-danger mb-1" onclick="borrar(<?php echo $d->idDoctor ?>, '<?php echo $d->nombre ?>')"><i class="bi bi-trash"></i> Eliminar</button>
              </form>  
              </td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
        <?php  include('../../footer.php') ?>
    </body>
    <script type="text/javascript">
          function borrar(idDoctor, nombre ){
            var continuar = confirm('¿Desea borrar el Registro de '+ nombre + '?');
            if (continuar){
              var formulario = document.getElementById('form' + idDoctor);
              formulario.submit();
            }
          }
    </script>
</html>
