<?php
  require_once 'includes/funciones/funciones.php';
  require_once 'includes/templates/header.php';

 if(isset($_POST['btnComprar'])){
   		$id_producto = $_POST['id'];

   $sql = "SELECT * FROM PRODUCTO WHERE id_producto=$id_producto" ;
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
						<h3 class="breadcrumb-header">Carrito</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Compras</li>
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
				<form method="post" action="pagar.php">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Datos Personales</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first-name" placeholder="Nombre Completo">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last-name" placeholder="Apellidos">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="dni" placeholder="Dni">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Direccion">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="Ciudad">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Pais">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telefono">
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="create-account">
									<label for="create-account">
										<span></span>
										¿Crear Cuenta?
									</label>
									<div class="caption">
										<p>Asegurese de ingresar los datos correctos para evitar retraso en su envio.</p>
										<input class="input" type="password" name="password" placeholder="Ingrese Contraseña">
									</div>
								</div>
							</div>
						</div>
						<!-- /Billing Details -->
						
					</div>

					<!-- Order Details -->
					
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Tu Orden</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCTOS</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div >1x <?php echo $producto['nombre']?></div>
									<input type="hidden" name="nombre" value="<?php echo $producto['nombre']?>">
									<div name="precio_actual">$<?php echo $producto['precio_actual']?></div>
								</div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div>
									<strong class="order-total">$<?php echo $producto['precio_actual']?></strong>
									<input type="hidden" name="precio_actual" value="<?php echo $producto['precio_actual']?>">
								</div>
							</div>
						</div>

						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3" required="">
								<label for="payment-3">
									<span></span>
									Pago con Paypal
								</label>
								<div class="caption">
									<p>El pago que se realizara con Paypal y por tal motivo se cobrara $13 de envio.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms" required="">
							<label for="terms">
								<span></span>
								Usted acepta los<a href="#">Terminos y Condiciones</a>
							</label>
						</div>
						<button  name="comprar" class="primary-btn order-submit">Realizar Compra</button>
					</div>
				</form>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<?php  } 
else{
	
}
?>
<?php
  include_once 'includes/templates/footer.php';
?>