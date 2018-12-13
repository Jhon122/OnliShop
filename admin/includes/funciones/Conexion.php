<?php

class Conexion {

    private static $conexion;

    public static function abrir_conexion() {
        if (!isset(self::$conexion)) {
            try {
                include_once 'config.php';

                self::$conexion = new PDO('sqlsrv:server='.SERVER_NAME.'; Database='.DATABASE, UID, PWD);
                self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Conectado";

            } catch (PDOException $ex) {
                print "ERROR: " . $ex -> getMessage() . "<br>";
                echo "no se conecto";
                die();
            }
        }
    }
    
    public static function cerrar_conexion() {
        if (isset(self::$conexion)) {
            self::$conexion = null;
        }
    }
    
    public static function obtener_conexion() {
        return self::$conexion;
    }
}