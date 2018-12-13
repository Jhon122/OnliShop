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
        Listado de Categorias de Productos
        <small></small>
      </h1>
    </section>
    <!-- Main content -->
      <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja las Categorias de los productos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Icono</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    try{ 
                      $sql = "SELECT * FROM categoria" ;
                      $stmt = sqlsrv_query($conn_sis,$sql);

                      }catch (Exception $e) {
                         echo $e->getMessage();
                      }
                    while($categoria = $resultado = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){?>
                    <tr>
                      <td><?php echo $categoria['nombre']?></td>
                       <td><img src="img/categoria/<?php echo $categoria['foto']?>" width="150px" height="150px"></td>
                      <td>
                        <a href="editar-categoria.php?id_categoria=<?php echo $categoria['id_categoria']?>" class="btn bg-orange btn-flat margin">
                          <i class="fa fa-pencil"aria-hidden="true"></i>
                        </a>
                        <a href="#" data-id="<?php echo $categoria['id_categoria']; ?>" data-tipo="categoria" class="btn bg-maroon bnt-flat margin borrar_registro">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>

                    </tr>
                  <?php } ?>
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