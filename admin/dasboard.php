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
        Dashboard
        <small>Informacion sobre la Tienda</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        
      <div class="row">
          <div class="col-lg-3 col-xs-6">
           <?php
           		$sql = " SELECT COUNT(id_categoria)AS categorias FROM categoria ";
           		$resultado = sqlsrv_query($conn_sis,$sql);
           		$categorias = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)
           ?>
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $categorias['categorias']?></h3>

                <p>Total Categorias</p>
              </div>
              <div class="icon">
                <i class="fa fa-clone"></i>
              </div>
              <a href="lista_categoria.php" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
         <div class="col-lg-3 col-xs-6">
            <?php
            	$sql = "SELECT COUNT(id_marca)AS marcas FROM marca ";
		        $resultado = sqlsrv_query($conn_sis,$sql);
		        $categorias = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)
		    ?>
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $categorias['marcas']?></h3>

                <p>Total Marcas</p>
              </div>
              <div class="icon">
                <i class="fa fa-rub"></i>
              </div>
              <a href="lista_marcas.php" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
            <div class="col-lg-3 col-xs-6">
            <?php
            	$sql = "SELECT  count(id_producto) AS productos from producto ";
		        $resultado = sqlsrv_query($conn_sis,$sql);
		        $categorias = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)
		    ?>
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $categorias['productos']?></h3>

                <p>Total Productos</p>
              </div>
              <div class="icon">
                <i class="fa fa-product-hunt"></i>
              </div>
              <a href="lista_producto.php" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>
        <h2 class="page-header">Registrados</h2>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3>0.0.0</h3>

                <p>Total Registrados</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="#sad" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
	include_once 'includes/templates/footer.php';
?>