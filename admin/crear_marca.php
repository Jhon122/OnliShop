<?php
    include_once 'includes/templates/header.php';
    include_once 'includes/templates/barra.php';
    include_once 'includes/templates/navegacion.php'; 
    
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Marcas
        <small>Llena el formulario para crear una Marca</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Marca</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  name="guardar-registro" 
                id="guardar-registro-archivo"
                  method="post" 
                  action="app/modelo-marca.php"
                  enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre_marca">Nombre:</label>
                  <input type="text" class="form-control" id="nombre_marca" name="nombre_marca" placeholder="Ingrese el Nombre de la Marca" required="">
                </div>
                <div class="form-group">
                  <label for="imagen_agregar">Imagen:</label>
                  <input class="form-control" type="file" id="imagen_agregar" name="archivo_imagen" onchange="mostrarImagen()"/>
                  <br>
                  <img style="width: 100px;" id="img1" alt="Imagen de la Marca" />
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="hidden" name="registro" value="nuevo"> 
                <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
              </div>
            </form>
          </div>
          </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include_once 'includes/templates/footer.php';
  ?>