<?php
	include_once 'includes/funciones/funciones.php';
	include_once 'includes/templates/header.php';
?>
<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Pagos Realizados</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Home</a></li>
							<li class="active">Pago</li>
						</ul>

					</div>
					<br><br><br><br>
						<?php
						    $resultado = $_GET['exito'];
						    
						      if($resultado == "true") {
						      	$paymentId = $_GET['paymentId'];

						                      echo "El pago se realizo correctamente! ";
						                      echo "El id es {$paymentId} ";
						      }else{ 
						      	echo "El pago no se realizo ";
						      }
            
						 ?>
					<br><br><br><br>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>  

 <?php
	include_once 'includes/templates/footer.php';
?>