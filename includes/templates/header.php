<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Onlishop</title>
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"/>  

  </head>
  <body>
    <!-- HEADER -->
    <header>
      

      <!-- MAIN HEADER -->
      <div id="header">
        <!-- container -->
        <div class="container">
          <!-- row -->
          <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
              <div class="header-logo">
                <a href="index.php" class="logo">
                  <img src="./img/logo.png" alt="">
                </a>
              </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <?php
              try{
                  $sql = "SELECT * FROM categoria" ;
                  $stmt = sqlsrv_query($conn_sis,$sql);
                }catch (Exception $e) {
                  echo $e->getMessage();
               }?> 
            <div class="col-md-6">
              
              <div class="header-search">
                <form>
                  <select class="input-select">
                    <option value="0">Categorias</option>
                    <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                    <option value="1"><?php echo $categoria['nombre']?></option>
                    <?php } ?>
                  </select>
                  <input class="input" placeholder="Busca Aqui">
                  <button class="search-btn">Buscar</button>
                </form>
              </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- NAVBAR -->
            <div class="col-md-3 clearfix">
              <div class="header-ctn">
                <!-- CARR -->
                <div class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Carrito</span>
                    <div class="qty">1</div>
                  </a>

                  <div class="cart-dropdown">
                    <form method="post" action="buy_products.php">
                      <div class="cart-list">
                        <?php
                          $sql= "SELECT TOP 1 ID_PRODUCTO,NOMBRE,FOTO_PRINCIPAL,PRECIO_ACTUAL FROM PRODUCTO";
                          $stmt = sqlsrv_query($conn_sis,$sql); 
                        ?>
                         <?php while($producto = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
                          <div class="product-widget">
                          <div class="product-img">
                            <img src="admin/img/producto/<?php echo $producto['FOTO_PRINCIPAL']?>" alt="">
                          </div>

                          <div class="product-body">
                            <h3 class="product-name"><a href="#"><?php echo $producto['NOMBRE']?></a></h3>
                            <h4 class="product-price"><span class="qty">1 x</span>$<?PHP echo $producto['PRECIO_ACTUAL']?></h4>
                            <input type="hidden" name="id" value="<?php echo $producto['ID_PRODUCTO']?>">
                          </div>
                          <button class="delete"><i class="fa fa-close"></i></button>
                        </div>
                        <?php } ?>
                      </div>
                      <div class="cart-summary">
                        <small>1 Producto(s)Seleccionados</small>
                        <h5>TOTAL: $12.00</h5>
                      </div>
                      <div class="cart-btns">
                        <a href="#">Vaciar Carrito</a>
                        <button class="art-btns" id="crear_registro" name="btnComprar" value="">
                              Comprar
                        </button>
                      </div>
                  </form>
                  </div>
                  
                </div>
                <!-- /Cart -->

                <!-- Menu Toogle -->
                <div class="menu-toggle">
                  <a href="#">
                    <i class="fa fa-bars"></i>
                    <span>Menu</span>
                  </a>
                </div>
                <!-- /Menu Toogle -->
              </div>
            </div>
            <!-- /ACCOUNT -->
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->


    <!-- NAVIGATION -->
    <nav id="navigation">
      <!-- container -->
      <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
          <!-- NAV -->
          <?php
              try{
                  $sql = "SELECT * FROM categoria" ;
                  $stmt = sqlsrv_query($conn_sis,$sql);
                }catch (Exception $e) {
                  echo $e->getMessage();
          }?>
          <ul class="main-nav nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
            
              <li>
                <a href="all_products.php?id=<?php echo $categoria['id_categoria']?>"><?php echo $categoria['nombre']?>
                </a>
              </li>
            <?php } ?>
          </ul>
          <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
      </div>
      <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->    