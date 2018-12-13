<?php
        $serverName = 'DESKTOP-D0P0NAU\SQLEXPRESS';
	$connectionInfo  = array("Database" => "ONLISHOP","UID" => "kevin", "PWD"=>"dejkmo", "CharacterSet"=>"UTF-8" );
	$conn_sis = sqlsrv_connect($serverName,$connectionInfo);
	if(!$conn_sis){
		echo "Error";
		die(print_r(sqlsrv_errors(),true));
	}
?>