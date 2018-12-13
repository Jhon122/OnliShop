<?php
  require_once 'includes/funciones/funciones.php';
  require_once 'includes/templates/header.php';

$id_categoria = $_GET['id'];
   

?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<?php
				              try{
				                  $sql = " SELECT DISTINCT P.SUBCATEGORIA,M.NOMBRE AS NOMBRE_MARCA FROM PRODUCTO AS P " ;
				                  $sql.=" INNER JOIN MARCA M ";
				                  $sql.=" ON P.ID_MARCA=M.ID_MARCA WHERE P.ID_CATEGORIA=$id_categoria ";
				                  $stmt = sqlsrv_query($conn_sis,$sql);
				                }catch (Exception $e) {
				                  echo $e->getMessage();
          					}?>
							<h3 class="aside-title">Subcategorias</h3>
							<div class="checkbox-filter">
								<?php while($producto = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
								<div class="input-checkbox">
									<input type="checkbox" id="category-1">
									<label for="category-1">
										<span></span>
										<?php echo $producto['SUBCATEGORIA']?>
										<small>(120)</small>
									</label>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<?php
				              try{
				                  $sql = " SELECT DISTINCT M.NOMBRE AS NOMBRE_MARCA FROM PRODUCTO AS P " ;
				                  $sql.=" INNER JOIN MARCA M ";
				                  $sql.=" ON P.ID_MARCA=M.ID_MARCA WHERE P.ID_CATEGORIA = $id_categoria";
				                  $stmt = sqlsrv_query($conn_sis,$sql);
				                }catch (Exception $e) {
				                  echo $e->getMessage();
          					}?>
							<h3 class="aside-title">Marcas</h3>
							<div class="checkbox-filter">
								<?php while($producto = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										<?php echo $producto['NOMBRE_MARCA']?>
										<small>(578)</small>
									</label>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<?php
		                     try{
		                        $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.id_producto,p.subcategoria,p.precio_actual,p.precio_anterior from producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where c.id_categoria=$id_categoria" ;
		                        $stmt = sqlsrv_query($conn_sis,$sql);
		                       }catch (Exception $e) {
		                         echo $e->getMessage();
		                 	 } 
		                 	  while($categoria = $resultado = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){?>
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<form action="one_products.php" method="post">
									<div class="product-img">
										 <img src="admin/img/producto/<?php echo $categoria['foto_principal']?>" alt="">
										<div class="product-label">
											<span class="new">NUEVO</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $categoria['subcategoria']?></p>
										<h3 class="product-name"><a href="#"><?php echo $categoria['nombre_producto']?></a></h3>
										<h4 class="product-price">$<?php echo $categoria['precio_actual']?> <del class="product-old-price">$<?php echo $categoria['precio_anterior']?></del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
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
										<button class="add-to-cart-btn agregar-carrito" >
											<i class="fa fa-shopping-cart"></i>
											Agregar carrito
										</button>
									</div>
									</form>
								</div>
							</div>
							<!-- /product -->
							 <?php } ?>
						</div>
						<!-- /store products -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<script src="js/app.js"></script>
<?php
  include 'includes/templates/suscribe.php'; 
  include_once 'includes/templates/footer.php';
?>