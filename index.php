<?php
  require_once 'includes/funciones/funciones.php';
  require_once 'includes/templates/header.php';
  include 'includes/templates/section.php';
  include 'includes/templates/new_products.php';
?>

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <div class="hot-deal">
              <ul class="hot-deal-countdown">
                <li>
                  <div>
                    <h3 id="dias"></h3>
                    <span>Dias</span>
                  </div>  
                </li>
                <li>
                  <div>
                    <h3 id="horas"></h3>
                    <span>Horas</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3 id="minutos"></h3>
                    <span>Minutos</span>
                  </div>
                </li>
                <li>
                  <div>
                    <h3 id="segundos"></h3>
                    <span>Segundos</span>
                  </div>
                </li>
              </ul>
              <h2 class="text-uppercase">Aprovecha lo oferta por navidad</h2>
              <p>Nueva Coleccion 50% Descuento</p>
              <a class="primary-btn cta-btn" href="#">Compra Ahora</a>
            </div>
          </div>
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /END SECTION -->


<?php
  include_once 'includes/templates/sliders.php';
  
?>
<div id="mapa" class="mapa">
</div>
<style type="text/css">
  #mapa{
    display: inline-block!important;
    height: 400px;
    width: 100%;
    border-top: 2px solid #E4E7ED;
  }
  #newsletter.section{
    margin-top: 0px!important;
  }
</style>

<?php 
  include 'includes/templates/suscribe.php'; 
  include_once 'includes/templates/footer.php';
?>