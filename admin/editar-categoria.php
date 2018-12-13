<?php
  $id_categoria = $_GET['id_categoria'];

  if(!filter_var($id_categoria,FILTER_VALIDATE_INT)){
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
        Editar Categorias de Productos
        <small>Llena el formulario para editar una categoria</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8">
      
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Categoria</h3>
        </div>
        <div class="box-body">
          <?php
            $sql = "SELECT * FROM categoria WHERE id_categoria = $id_categoria" ;
            $stmt = sqlsrv_query($conn_sis,$sql);
            $categoria = $resultado = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)
          ?>
          <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="app/modelo-categoria.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre ">Nombre:</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Categoria" value="<?php echo $categoria['nombre']?>" required="">
                </div>
                 <div class="form-group">
                  <label for="imagen_actual">Imagen Actual</label><br>
                  <img style="width: 100px;" src="img/categoria/<?php echo $categoria['foto']?>" >
                </div>
                <div class="form-group">
                  <label for="imagen_agregar">Imagen</label>
                   <input class="form-control" type="file" id="imagen_agregar" name="archivo_imagen" onchange="mostrarImagen()"/>
                  <br>
                  <img style="width: 100px;" id="img1" alt="Imagen de la Categoria" />
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar"> 
                <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']?>">
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