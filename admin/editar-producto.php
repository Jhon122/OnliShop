<?php
  $id_producto = $_GET['id_producto'];

  if(!filter_var($id_producto,FILTER_VALIDATE_INT)){
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
      <div class="col-md-12">
      
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Categoria</h3>
        </div>
        <div class="box-body">
          <?php
            $sql = "SELECT p.id_producto,p.id_categoria,p.id_marca,c.nombre as nombre_categoria,m.nombre as nombre_marca,p.subcategoria, " ;
            $sql.= " p.tallas,p.codigo,p.nombre as nombre_producto,p.precio_actual,p.precio_anterior ";
            $sql.= ",p.stock,p.genero,p.detalles,p.descripcion,p.foto_principal ";
            $sql.= " FROM producto as p ";
            $sql.= " inner join categoria as c ";
            $sql.= " on p.id_categoria = c.id_categoria ";
            $sql.= " inner join marca as m ";
            $sql.= " on p.id_marca = m.id_marca ";
            $sql.= " where id_producto = $id_producto ";
            $stmt = sqlsrv_query($conn_sis,$sql);
            $producto = $resultado = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)
          ?>
          <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="post" action="app/modelo-producto.php" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group text-center">
                  <label for="imagen_actual">Imagen Actual</label><br>
                  <img style="width: 100px;" src="img/producto/<?php echo $producto['foto_principal']?>" >
                </div>
                <div class="form-group">
                  <label for="imagen_agregar">Imagen</label>
                   <input class="form-control" type="file" id="imagen_agregar" name="archivo_imagen" onchange="mostrarImagen()"/>
                  <br>
                  <img style="width: 100px;" id="img1" alt="Imagen de la Categoria" />
                </div>
                <div class="form-group col-md-6">
                  <label for="nombre_producto ">Nombre del Producto:</label>
                  <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre del Producto" value="<?php echo $producto['nombre_producto']?>" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="codigo ">Codigo del Producto:</label>
                  <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo" value="<?php echo $producto['codigo']?>" required="">
                </div>

                <div class="form-group col-md-6">
                  <label for="nombre_categoria ">Categoria:</label>
                  <select name="categoria_producto" class="form-control seleccionar">
                    <option value="0">-Seleccione-</option>
                      <?php
                        try{
                          $categoria_actual = $producto['id_categoria'];
                          $sql = "SELECT * FROM categoria";
                          $resultado_2 = sqlsrv_query($conn_sis,$sql);
                          while($cat_producto = sqlsrv_fetch_array($resultado_2, SQLSRV_FETCH_ASSOC)){
                            if($cat_producto['id_categoria'] == $categoria_actual){ ?>
                              <option value="<?php echo $cat_producto['id_categoria'];?>" selected><?php echo $cat_producto['nombre']?>
                              </option>

                            <?php } else { ?>
                            <option value="<?php echo $cat_producto['id_categoria'];?>">  <?php echo $cat_producto['nombre'];?>
                              </option>
                         <?php }
                        }
                      }catch(Exception $e){
                          echo "Error" . $e->getMessage();
                      }
                    ?>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="nombre_marca">Marca:</label>
                  <select name="marca_producto" class="form-control seleccionar">
                    <option value="0">-Seleccione-</option>
                    <?php
                      try{
                        $marca_actual = $producto['id_marca'];
                        $sql = "SELECT * FROM marca";
                        $resultado_3 = sqlsrv_query($conn_sis,$sql);
                        while($cat_marca = sqlsrv_fetch_array($resultado_3, SQLSRV_FETCH_ASSOC)){
                          if($cat_marca['id_marca'] == $marca_actual){ ?>
                            <option value="<?php echo $cat_marca['id_marca'];?>" selected>
                              <?php echo $cat_marca['nombre']?>
                            </option>

                          <?php } else { ?>
                          <option value="<?php echo $cat_marca['id_marca'];?>">
                            <?php echo $cat_marca['nombre'];?>
                          </option>
                       <?php }
                      }
                    }catch(Exception $e){
                        echo "Error" . $e->getMessage();
                    }
                  ?>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <label for="subcategoria ">Subcategoria:</label>
                  <input type="text" class="form-control" id="subcategoria" name="subcategoria" placeholder="Subcategoria" value="<?php echo $producto['subcategoria']?>" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="tallas">Tallas:</label>
                  <input type="text" class="form-control" id="tallas" name="tallas" placeholder="Tallas" value="<?php echo $producto['tallas']?>" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="precio_actual ">Precio Actual:</label>
                  <input type="text" class="form-control" id="precio_actual" name="precio_actual" placeholder="Producto" value="<?php echo $producto['precio_actual']?>" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="precio_anterior ">Precio Anterior:</label>
                  <input type="text" class="form-control" id="precio_anterior" name="precio_anterior" placeholder="Producto" value="<?php echo $producto['precio_anterior']?>" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="stock">Stock:</label>
                  <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" value="<?php echo $producto['stock']?>" required="">
                </div>
                <div class="form-group col-md-6">
                  <label for="genero">Genero:</label>
                  <input type="text" class="form-control" id="genero" name="genero" placeholder="Genero" value="<?php echo $producto['genero']?>" required="">
                </div>
                <div class="form-group col-md-12">
                  <label for="detalles">Detalles:</label>
                  <textarea class="form-control" id="detalles" name="detalles" placeholder="Detalles" required=""><?php echo $producto['detalles']?></textarea>
                </div>
                <div class="form-group col-md-12">
                  <label for="descripcion ">Descripcion:</label>
                  <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion" required=""><?php echo $producto['descripcion']?></textarea>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <input type="hidden" name="registro" value="actualizar"> 
                <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto']?>">
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