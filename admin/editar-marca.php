<?php
  $id_marca = $_GET['id'];

  if(!filter_var($id_marca,FILTER_VALIDATE_INT)){
    header("Location: ../error/404.html");
  };
    include_once 'app/Conexion.php';
    include_once 'includes/templates/header.php';
    include_once 'includes/templates/barra.php';
    include_once 'includes/templates/navegacion.php'; 

?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Marca de Productos
        <small>Llena el formulario para editar una Marca</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8">
      
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Marca</h3>
        </div>
        <div class="box-body">
          <?php
            $sql = "SELECT * FROM marca WHERE id_marca = $id_marca" ;
            $stmt = sqlsrv_query($conn_sis,$sql);
            $marca = $resultado = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)
          ?>
          <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="app/modelo-marca.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre ">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Marca" value="<?php echo $marca['nombre']?>" required="">
                </div>
                 <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label><br>
                  <img style="width: 100px;" src="img/marca/<?php echo $marca['foto']?>" >
                </div>
                <div class="form-group">
                  <label for="imagen_agregar">Imagen</label>
                   <input class="form-control" type="file" id="imagen_agregar" name="archivo_imagen" onchange="mostrarImagen()"/>
                  <br>
                  <img style="width: 100px;" id="img1" alt="Imagen de la Marca" />
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar"> 
                <input type="hidden" name="id_marca" value="<?php echo $marca['id_marca']?>">
                <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
              </div>
            </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      </section>

      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php
    include_once 'includes/templates/footer.php';
?>