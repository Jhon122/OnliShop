<?php

require 'includes/funciones/paypal/autoload.php';

define('URL_SITIO','http://localhost:8080/onlishop');

$apiContext = new \PayPal\Rest\ApiContext(
	new \PayPal\Auth\OAuthTokenCredential(
		'AYg0J57saJULOMAEIs1Q6w29KikBQRGp9SnZM3kaKdFaAIW_S_LxMiekjDtbQOT72AVO63fSlHRKsDcB',//Cliente id
		'EGG1-FsPKofpw2GlG0YYuvn7OgSwX1jQ9m7tQQ-lmosiKcabn6jpmCU0nlsawvqvIQMS3bTswIjFwX-6'//secret
	)
);
