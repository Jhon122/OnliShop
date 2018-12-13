    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
      
        <div class="row">
          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Top Polos</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-2">
                    <!-- product -->
                    <?php
                     try{
                        $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.subcategoria,p.precio_actual,p.precio_anterior,p.id_producto from producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where c.id_categoria=1" ;
                        $stmt = sqlsrv_query($conn_sis,$sql);

                   while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>      
                    <div class="product">
                      <form action="one_products.php" method="post">
                      <div class="product-img">
                        <img src="admin/img/producto/<?php echo $categoria['foto_principal']?>" alt="">
                        <div class="product-label">
                          <span class="new">Nuevo</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category"></p>
                        <h3 class="product-name"><a href="#"><?php echo $categoria['nombre_producto']?></a></h3>
                        <h4 class="product-price">$<?php echo $categoria['precio_actual']?> <del class="product-old-price">$<?php echo $categoria['precio_anterior']?></del></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <input type="hidden" name="id" value="<?php echo $categoria['id_producto']?>">
                        </div>
                        <div class="product-btns">
                          <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Lista deseos</span></button>
                          <button class="quick-view" name="btnVisualizar" value="visualizas">
                              <i class="fa fa-eye"></i>
                              <span class="tooltipp">Visualizar</span>
                          </button>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar carrito</button>
                      </div>
                    </form>
                    </div>
                    <?php }
                      }catch (Exception $e) {
                             echo $e->getMessage();
                      }
                    ?>
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-2" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>

        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
      
        <div class="row">
          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Top Shorts</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-3">
                    <!-- product -->
                    <?php
                     try{
                        $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.subcategoria,p.precio_actual,p.precio_anterior,p.id_producto from producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where c.id_categoria=2" ;
                        $stmt = sqlsrv_query($conn_sis,$sql);
                       }catch (Exception $e) {
                         echo $e->getMessage();
                  } ?>
                  <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>      
                    <div class="product">
                      <form action="one_products.php" method="post">
                      <div class="product-img">
                        <img src="admin/img/producto/<?php echo $categoria['foto_principal']?>" alt="">
                        <div class="product-label">
                          <span class="new">Nuevo</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category"></p>
                        <h3 class="product-name"><a href="#"><?php echo $categoria['nombre_producto']?></a></h3>
                        <h4 class="product-price">$<?php echo $categoria['precio_actual']?> <del class="product-old-price">$<?php echo $categoria['precio_anterior']?></del></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <input type="hidden" name="id" value="<?php echo $categoria['id_producto']?>">
                        </div>
                        <div class="product-btns">
                          <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Lista deseos</span></button>
                          <button class="quick-view" name="btnVisualizar" value="visualizas">
                              <i class="fa fa-eye"></i>
                              <span class="tooltipp">Visualizar</span>
                          </button>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar carrito</button>
                      </div>
                    </form>
                    </div>
                    <?php } ?>
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-3" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>

        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->
    
    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
      
        <div class="row">
          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Top Pantalones</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-4">
                    <!-- product -->
                    <?php
                     try{
                        $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.subcategoria,p.precio_actual,p.precio_anterior,p.id_producto from producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where c.id_categoria=3" ;
                        $stmt = sqlsrv_query($conn_sis,$sql);
                       }catch (Exception $e) {
                         echo $e->getMessage();
                  } ?>
                  <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>      
                    <div class="product">
                      <form action="one_products.php" method="post">
                      <div class="product-img">
                        <img src="admin/img/producto/<?php echo $categoria['foto_principal']?>" alt="">
                        <div class="product-label">
                          <span class="new">Nuevo</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category"></p>
                        <h3 class="product-name"><a href="#"><?php echo $categoria['nombre_producto']?></a></h3>
                        <h4 class="product-price">$<?php echo $categoria['precio_actual']?> <del class="product-old-price">$<?php echo $categoria['precio_anterior']?></del></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <input type="hidden" name="id" value="<?php echo $categoria['id_producto']?>">
                        </div>
                        <div class="product-btns">
                          <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Lista deseos</span></button>
                          <button class="quick-view" name="btnVisualizar" value="visualizas">
                              <i class="fa fa-eye"></i>
                              <span class="tooltipp">Visualizar</span>
                          </button>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar carrito</button>
                      </div>
                    </form>
                    </div>
                    <?php } ?>
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-4" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>

        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

     <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
      
        <div class="row">
          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Top Gorros</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-5">
                    <!-- product -->
                    <?php
                     try{
                        $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.subcategoria,p.precio_actual,p.precio_anterior,p.id_producto from producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where c.id_categoria=4" ;
                        $stmt = sqlsrv_query($conn_sis,$sql);
                       }catch (Exception $e) {
                         echo $e->getMessage();
                  } ?>
                  <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>      
                    <div class="product">
                      <form action="one_products.php" method="post">
                      <div class="product-img">
                        <img src="admin/img/producto/<?php echo $categoria['foto_principal']?>" alt="">
                        <div class="product-label">
                          <span class="new">Nuevo</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category"></p>
                        <h3 class="product-name"><a href="#"><?php echo $categoria['nombre_producto']?></a></h3>
                        <h4 class="product-price">$<?php echo $categoria['precio_actual']?> <del class="product-old-price">$<?php echo $categoria['precio_anterior']?></del></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <input type="hidden" name="id" value="<?php echo $categoria['id_producto']?>">
                        </div>
                        <div class="product-btns">
                          <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Lista deseos</span></button>
                          <button class="quick-view" name="btnVisualizar" value="visualizas">
                              <i class="fa fa-eye"></i>
                              <span class="tooltipp">Visualizar</span>
                          </button>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar carrito</button>
                      </div>
                    </form>
                    </div>
                    <?php } ?>
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-5" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>

        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

     <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
      
        <div class="row">
          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Top Medias</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-6">
                    <!-- product -->
                    <?php
                     try{
                        $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.subcategoria,p.precio_actual,p.precio_anterior,p.id_producto from producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where c.id_categoria=5" ;
                        $stmt = sqlsrv_query($conn_sis,$sql);
                       }catch (Exception $e) {
                         echo $e->getMessage();
                  } ?>
                  <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>      
                    <div class="product">
                      <form action="one_products.php" method="post">
                      <div class="product-img">
                        <img src="admin/img/producto/<?php echo $categoria['foto_principal']?>" alt="">
                        <div class="product-label">
                          <span class="new">Nuevo</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category"></p>
                        <h3 class="product-name"><a href="#"><?php echo $categoria['nombre_producto']?></a></h3>
                        <h4 class="product-price">$<?php echo $categoria['precio_actual']?> <del class="product-old-price">$<?php echo $categoria['precio_anterior']?></del></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <input type="hidden" name="id" value="<?php echo $categoria['id_producto']?>">
                        </div>
                        <div class="product-btns">
                          <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Lista deseos</span></button>
                          <button class="quick-view" name="btnVisualizar" value="visualizas">
                              <i class="fa fa-eye"></i>
                              <span class="tooltipp">Visualizar</span>
                          </button>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar carrito</button>
                      </div>
                    </form>
                    </div>
                    <?php } ?>
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-6" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>

        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
      
        <div class="row">
          <!-- section title -->
          <div class="col-md-12">
            <div class="section-title">
              <h3 class="title">Top Guantes</h3>
            </div>
          </div>
          <!-- /section title -->

          <!-- Products tab & slick -->
          <div class="col-md-12">
            <div class="row">
              <div class="products-tabs">
                <!-- tab -->
                <div id="tab2" class="tab-pane fade in active">
                  <div class="products-slick" data-nav="#slick-nav-7">
                    <!-- product -->
                    <?php
                     try{
                        $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.subcategoria,p.precio_actual,p.precio_anterior,p.id_producto from producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where c.id_categoria=6" ;
                        $stmt = sqlsrv_query($conn_sis,$sql);
                       }catch (Exception $e) {
                         echo $e->getMessage();
                  } ?>
                  <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>      
                    <div class="product">
                      <form action="one_products.php" method="post">
                      <div class="product-img">
                        <img src="admin/img/producto/<?php echo $categoria['foto_principal']?>" alt="">
                        <div class="product-label">
                          <span class="new">Nuevo</span>
                        </div>
                      </div>
                      <div class="product-body">
                        <p class="product-category"></p>
                        <h3 class="product-name"><a href="#"><?php echo $categoria['nombre_producto']?></a></h3>
                        <h4 class="product-price">$<?php echo $categoria['precio_actual']?> <del class="product-old-price">$<?php echo $categoria['precio_anterior']?></del></h4>
                        <div class="product-rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <input type="hidden" name="id" value="<?php echo $categoria['id_producto']?>">
                        </div>
                        <div class="product-btns">
                          <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Lista deseos</span></button>
                          <button class="quick-view" name="btnVisualizar" value="visualizas">
                              <i class="fa fa-eye"></i>
                              <span class="tooltipp">Visualizar</span>
                          </button>
                        </div>
                      </div>
                      <div class="add-to-cart">
                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar carrito</button>
                      </div>
                    </form>
                    </div>
                    <?php } ?>
                    <!-- /product -->
                  </div>
                  <div id="slick-nav-7" class="products-slick-nav"></div>
                </div>
                <!-- /tab -->
              </div>
            </div>
          </div>
          <!-- /Products tab & slick -->
        </div>

        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /SECTION -->