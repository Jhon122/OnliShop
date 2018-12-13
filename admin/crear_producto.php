<?php
    include_once 'includes/templates/header.php';
    include_once 'includes/templates/barra.php';
    include_once 'includes/templates/navegacion.php'; 
    include_once 'app/Conexion.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Producto
        <small>Llena el formulario para crear un Producto</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Producto</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" 
                  method="post" 
                  action="app/modelo-producto.php"
                  enctype="multipart/form-data">
              <div class="box-body">
                <div class="col-md-12 ">
                  <label for="imagen_agregar">Imagen Principal:</label>
                  <input class="form-control" type="file" id="imagen_agregar" name="archivo_imagen" onchange="mostrarImagen()"/>
                  <br>
                  <center>
                  <img style="width: 200px; height: 200px; text-align: center;" id="img1" alt="Imagen del Producto" />
                  </center>
                </div>
                <div class="col-md-6">
                  <label for="categoria">Categoria:</label>
                  <select name="categoria" class="form-control seleccionar">
                    <option value="0">-Seleccione-</option>
                    <?php
                      $sql = "SELECT * FROM categoria";
                      $stmt = sqlsrv_query($conn_sis,$sql);
                     while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                      <option value="<?php echo $categoria['id_categoria'];?>">
                        <?php echo $categoria['nombre']?>
                      </option>
                    <?php 
                    }?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="marca">Marca:</label>
                  <select name="marca" class="form-control seleccionar">
                    <option value="0">-Seleccione-</option>
                    <?php
                      $sql = "SELECT * FROM marca";
                      $stmt = sqlsrv_query($conn_sis,$sql);
                     while($marca = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                      <option value="<?php echo $marca['id_marca'];?>">
                        <?php echo $marca['nombre']?>
                      </option>
                    <?php 
                    }?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="subcategoria">Subcategoria:</label>
                  <input type="text" class="form-control" name="subcategoria" id="subcategoria" placeholder="Ingrese Subcategoria">
                </div>
                <div class="col-md-6">
                  <label for="talla">Tallas:</label>
                  <input type="text" class="form-control" name="talla" id="talla" placeholder="Ingrese Tallas">
                </div>
                <div class="col-md-6">
                  <label for="codigo_producto">Codigo:</label>
                  <input type="text" class="form-control" name="codigo_producto" id="codigo_producto" placeholder="Ingrese Codigo">
                </div>
                <div class="col-md-6">
                  <label for="nombre_producto">Nombre:</label>
                  <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" placeholder="Ingrese Nombre Producto">
                </div>
                <div class="col-md-6">
                  <label for="precio_actual">Precio Actual:</label>
                  <input type="number" class="form-control" name="precio_actual" id="precio_actual" placeholder="Ingrese Precio Actual">
                </div>
                <div class="col-md-6">
                  <label for="precio_anterior">Precio Anterior:</label>
                  <input type="number" class="form-control" name="precio_anterior" id="precio_anterior" placeholder="Ingrese Precio Anterior">
                </div>
                <div class="col-md-6">
                  <label for="stock">Stock:</label>
                  <input type="number" class="form-control" name="stock" id="stock" placeholder="Ingrese Stock">
                </div>
                 <div class="col-md-6">
                  <label for="genero">Genero:</label>
                  <input type="text" class="form-control" name="genero" id="genero" placeholder="Ingrese Genero">
                </div>
                 <div class="col-md-12">
                  <label for="detalles">Detalles:</label>
                  <!--<input type="text" class="form-control" name="detalles" id="detalles" placeholder="Ingrese Detalles">!-->
                  <textarea class="form-control" name="detalles" id="detalles" placeholder="Ingrese Detalles"></textarea>
                </div>
                <div class="col-md-12">
                  <label for="descripcion">Descripcion:</label>
                  <!--<input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese Descripcion">!-->
                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese la Descripcion"></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <center>
                  <input type="hidden" name="registro" value="nuevo"> 
                  <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
                </center>
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