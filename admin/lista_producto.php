<?php
    include_once 'app/Conexion.php';
    include_once 'includes/templates/header.php';
    include_once 'includes/templates/barra.php';
    include_once 'includes/templates/navegacion.php'; 
    
?>
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Productos
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los Productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Categoria</th>
                  <th>Subcategoria</th>
                  <th>Marca</th>
                  <th>Precio</th>
                  <th>Stock</th>
                  <th>Foto</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    try{ 
                      $sql = "SELECT p.id_producto,p.subcategoria,p.nombre as nombre_producto,c.nombre as nombre_categoria,m.foto as foto_marca, ";
                      $sql.= " p.precio_actual,p.stock,p.foto_principal as foto_producto";
                      $sql.= " FROM producto as p";
                      $sql.= " inner join categoria as c ";
                      $sql.= " on p.id_categoria=c.id_categoria ";
                      $sql.= " inner join marca as m ";
                      $sql.= " on p.id_marca=m.id_marca ";
                      $sql.= " order by id_producto ";

                      $stmt = sqlsrv_query($conn_sis,$sql);

                      }catch (Exception $e) {
                         echo $e->getMessage();
                      }
                    while($producto = $resultado = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){ ?>
                    <tr>
                      <td><?php echo $producto['nombre_producto']?></td>
                      <td><?php echo $producto['nombre_categoria']?></td>
                      <td><?php echo $producto['subcategoria']?></td>
                      <td><img src="img/marca/<?php echo $producto['foto_marca']?>" width="150px" height="150px"></td>
                      <td><?php echo $producto['precio_actual']?></td>
                      <td><?php echo $producto['stock']?></td>
                      <td><img src="img/producto/<?php echo $producto['foto_producto']?>" width="150px" height="150px"></td>
                      <td>
                        <a href="editar-producto.php?id_producto=<?php echo $producto['id_producto']?>" class="btn bg-orange btn-flat margin">
                              <i class="fa fa-pencil"aria-hidden="true"></i>
                         </a>
                         <a href="#" data-id="<?php echo $producto['id_producto']; ?>" data-tipo="producto" class="btn bg-maroon bnt-flat margin borrar_registro">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                     <?php } 
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Icono</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
    include_once 'includes/templates/footer.php';
?>