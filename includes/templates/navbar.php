<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><span style="color:white">ONLI</span><span class="shop">SHOP</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorias
        </a>
       <?php 
      try{
         $sql = "SELECT * FROM categoria" ;
         $stmt = sqlsrv_query($conn_sis,$sql);
      }catch (Exception $e) {
        echo $e->getMessage();
      }?>    
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
          <a class="dropdown-item clasesita fa <?php echo $categoria['icono']?>" href='<?php echo $categoria['nombre']?>' > <?php echo $categoria['nombre']?></a>
          <?php } ?>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <!--<i class="fa fa-shopping-cart" aria-hidden="true"></i>-->
    

    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge">5</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/curso1.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h5 class="dropdown-item-title ach5">
                  Polo Verde 
                </h5>
                <p class="text-sm">Polo Mangas Cortas</p>
                <p class="text-sm text-muted"><i class="fa fa-dollar mr-1"></i> 12.00</p>
                <span class=" text-sm text-danger"><a href="#borrar" class="rojo"><i class="fa fa-times"></i></a></span>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Comprar</a>
        </div>
      </li>    </ul>
</form>
      

  </div>
</nav>
<style type="text/css">
text-right
</style>