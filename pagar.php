<?php
	

	 if(isset($_POST['comprar'])){
   		if(!isset($_POST['nombre'],$_POST['precio_actual'])){
   			exit("Hubo un error");
   		}
	}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'config.php';


$producto =htmlspecialchars($_POST['nombre']);
$precio =htmlspecialchars($_POST['precio_actual']); 
$precio = (int) $precio;


$envio = 13;
$total = $precio + $envio;

$compra = new Payer();
$compra->setPaymentMethod('paypal');


$articulo = new Item();
$articulo->setName($producto)
		 ->setCurrency('USD')
		 ->setQuantity(1)
		 ->setPrice($precio);


$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));

$detalles = new Details();
$detalles->setShipping($envio)
		 ->setSubtotal($precio);

$cantidad = new Amount();
$cantidad->setCurrency('USD')
		 ->setTotal($total)
		 ->setDetails($detalles);

$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
			->setItemList($listaArticulos)
			->setDescription('Pago')
			->setInvoiceNumber(uniqid());

/*echo $transaccion->getInvoiceNumber();*/

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO. "/pago_finalizado.php?exito=true")
			  ->setCancelUrl(URL_SITIO. "/pago_finalizado.php?exito=false");

            
$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));
     
     try {
       $pago->create($apiContext);
     } catch (PayPal\Exception\PayPalConnectionException $pce) {
       echo '<pre>';print_r(json_decode($pce->getData()));exit;
   }

$aprobado = $pago->getApprovalLink();

header("Location: {$aprobado}");

/*
if($_GET['exito'] == true){
	echo "El pago fue correcto";
}else{
	echo "hubo un error";
}*/