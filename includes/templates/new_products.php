 <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">

          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Nuevos Productos</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab1" class="tab-pane active">
                  <div class="products-slick" data-nav="#slick-nav-1">
                    <!-- product -->
                  <?php
                     try{
                        $sql = "SELECT  * FROM dbo.new_products " ;
                        $stmt = sqlsrv_query($conn_sis,$sql);
                       
                       }catch (Exception $e) {
                         echo $e->getMessage();
                  } ?>
                  <?php while($producto = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>  
                    
                    <div class="product">
                      <form action="one_products.php" method="post">
                      <div class="product-img">
                        <img src="admin/img/producto/<?php echo $producto['foto_principal']?>" alt="">
                        <div class="product-label">
                          <span class="new">Nuevo</span>
                        </div>
                      </div>
                        <div class="product-body">
                          <p class="product-category"><?php echo $producto['nombre_categoria']?></p>
                          <h3 class="product-name"><a href="#"><?php echo $producto['nombre_producto']?></a></h3>
                          <h4 class="product-price">$<?php echo $producto['precio_actual']?><del class="product-old-price"> $<?php echo $producto['precio_anterior']?></del></h4>
                          <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <input type="hidden" name="id" value="<?php echo $producto['id_producto']?>">
                          </div>
                          <div class="product-btns">
                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Lista de deseos</span></button>
                            <button class="quick-view" name="btnVisualizar" value="visualizas">
                              <i class="fa fa-eye"></i>
                              <span class="tooltipp">Visualizar</span>
                            </button>
                          </div>
                        </div>
                        <div  class="add-to-cart"> 
                          <button class="add-to-cart-btn" id="crear_registro_np" name="btnAgregar" value="">
                            <i class="fa fa-shopping-cart" ></i>
                             Agregar Carrito
                           </button>
                        </div>
                      </form>
                    </div>
                   <?php } ?>
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-1" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- Products tab & slick -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->