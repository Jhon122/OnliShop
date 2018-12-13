<?php
  require_once 'includes/funciones/funciones.php';
  require_once 'includes/templates/header.php';
   
   if(isset($_POST['btnVisualizar'])){
   		$id_producto = $_POST['id'];
   }
         
    $sql = "SELECT c.nombre as nombre_categoria,p.nombre as nombre_producto,p.foto_principal,p.subcategoria,p.id_producto,";
    $sql.=" p.precio_actual,p.precio_anterior,p.tallas,p.descripcion,p.detalles";
 	$sql.=" FROM producto as p  inner join categoria as c on p.id_categoria=c.id_categoria where p.id_producto=$id_producto" ;
    $stmt = sqlsrv_query($conn_sis,$sql);
    ($producto = $resultado = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC));
?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">Todas Las Categorias</a></li>
							<li><a href="#">Accesorios</a></li>
							<li class="active"><?php echo $producto['nombre_categoria']?></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>

							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>

							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>

							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>

							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>

							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>

							<div class="product-preview">
								<img src="./admin/img/producto/<?php echo $producto['foto_principal']?>" alt="product01">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $producto['nombre_producto']?></h2>
							<div>
								<h3 class="product-price">$<?php echo $producto['precio_actual']?> <del class="product-old-price">$<?php echo $producto['precio_anterior']?></del></h3>
								<span class="product-available">Disponible</span>
							</div>
							<p><?php echo $producto['descripcion']?></p>

							<div class="product-options">
								<label>
									Talla
									<select class="input-select" style="text-transform: uppercase;">
										<option value="0"><?php echo $producto['tallas']?></option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									Cantidad
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Agregar Carrito</button>
							</div>

							<ul class="product-links">
								<li>Categoria:</li>
								<li><a href="#"><?php echo $producto['nombre_categoria']?></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Descripcion</a></li>
								<li><a data-toggle="tab" href="#tab2">Detalles</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $producto['descripcion']?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
											<p><?php echo $producto['detalles']?></p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php
  include_once 'includes/templates/new_products.php';
  include 'includes/templates/suscribe.php'; 
  include_once 'includes/templates/footer.php';
?>