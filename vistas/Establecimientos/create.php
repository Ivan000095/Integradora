<html>
   <?php 
    include('../../head.php')
   
   
   
   ?>

    <body>
          <?php include('../../menu.php')?>  
           
        <div id="contenido"> 
        <br>    
        <h1 id="titulo">Nuevo Establecimiento</h1>
        <br>
        <form action="store.php" method="POST">
        <div class="row justify-content-center">
            <div class="col-4">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" name="Nombre" id="Nombre" class="form-control">
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="Descripcion" class="form-label">Descripcion</label>
                <input type="text" name="Descripcion" id="Descripcion" class="form-control">
            </div>
        </div>
         
 <div class="row justify-content-center">
            <div class="col-4">
                <label for="Horario" class="form-label">Horario</label>
                <input type="text" name="Horario" id="Horario" class="form-control">
            </div>
        </div>

         <div class="row justify-content-center">
            <div class="col-4">
                <label for="Dias_labo" class="form-label">Dias Laborales</label>
                <input type="text" name="Dias_labo" id="Dias_labo" class="form-control">
            </div>
        </div>        

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="Foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="Foto" id="Foto">
            </div>
        </div>

          <div class="row justify-content-center">
            <div class="col-4">
                <label for="DireccionyRef" class="form-label">Direccion y Referencia</label>
                <input type="text" name="DireccionyRef" id="DireccionyRef" class="form-control">
            </div>
        </div>        

          <div class="row justify-content-center">
            <div class="col-4">
                <input type="reset" value="Limpiar" class="btn btn-primary">
                <input type="submit" value="Guardar" class="btn btn-secondary">
            </div>
        </div>
        
    </div>
      </form>
        <?php include('../../footer.php')?>
    </body>
</html>