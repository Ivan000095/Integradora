<html>
   <?php 
    include('../../head.php');
    include('../../modelos/Establecimiento.php');
    $establecimiento = Establecimiento::lista();
    ?>

    <body>
          <?php include('../../menu.php')?>  
           
        <div id="contenido"> 
            
        <h1 id="titulo">ESTABLECIMIENTOS</h1>
        <a href="create.php" class="btn btn-outline-dark" id="btnadd"><i class="bi bi-person-add"></i> Agregar</a>
        <br>
    
              <table class="table" id="tabla-catalogo">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Horario</th>
                    <th>Dias laborales</th>
                    <th>Foto</th>
                    <th>Direccion</th>
                    <th>Acciones</th>
                    
                </tr>
                <?php 
                foreach($establecimiento as $e){
                ?>
                 <tr>
                    <td> <?php echo $e->Id_Establecimiento; ?> </td>
                    <td> <?php echo $e->Nombre; ?></td>
                    <td> <?php echo $e->Descripcion; ?></td>
                    <td> <?php echo $e->Horario; ?></td>
                    <td><?php echo $e->Dias_labo; ?></td>
                    <td><img src="../../uploads/<?php echo $e->Foto; ?>" alt="Foto de <?php echo $e->Nombre; ?>" width="90px"></td>
                    <td> <?php echo $e->DireccionyRef; ?></td>
                   
                    
                    <td>

                        <a href="edit.php?Id_Establecimiento=<?php echo $e->Id_Establecimiento; ?>">Editar</a>
                        
                        <form action="destroy.php?Id_Establecimiento=<?php echo $e->Id_Establecimiento; ?>" method="POST" id="form<?php echo $e->Id_Establecimiento;?>" class="inline">
                        <button type="button" class="btn" onclick="borrar(<?php echo $e->Id_Establecimiento; ?> ,'<?php echo $e->Nombre; ?>' )">Eliminar</button>
                      </form>
                    </td>
               

                </tr>
                <?php
                }
                ?>    

            </table>
        </div>
      
        <?php include('../../footer.php')?>
    
        <script type="text/javascript">
            function borrar(id, Nombre){
               var continuar = confirm('¿Deseas borrar el establecimiento seleccionado? ' + id + " "+ Nombre);
                if(continuar){
                   var formulario = document.getElementById('form' + id);
                    formulario.submit();
                }
            }

        </script>
    </body>
</html>