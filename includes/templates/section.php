<!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <?php
             try{
                $sql = "SELECT * FROM categoria" ;
                $stmt = sqlsrv_query($conn_sis,$sql);
             }catch (Exception $e) {
                 echo $e->getMessage();
             } ?>
          <!-- shop -->
          <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
          <div class="col-md-4 col-xs-6">
            <div class="shop">
              <div class="shop-img">
                <img src="admin/img/categoria/<?php echo $categoria['foto']?>" alt="Imagen Categoria">
              </div>
              <div class="shop-body">
                <h3>Coleccion de<br><?php echo $categoria['nombre']?></h3>
                <a href="all_products.php?id=<?php echo $categoria['id_categoria']?>" class="cta-btn">Visualizar<i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php } ?>
          <!-- shop -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->