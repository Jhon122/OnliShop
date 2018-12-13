<?php
//Guardar
if($_POST['registro'] == 'nuevo'){
    
    include_once 'Conexion.php';

    $nombre_marca = $_POST['nombre_marca'];

    $directorio = "../img/marca/";
     
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }
    try{
        $sql = "INSERT INTO marca(nombre,foto,creado) VALUES (?,?,GETDATE())";
        $parametro = array(&$nombre_marca,&$imagen_url);
        $stmt = sqlsrv_prepare($conn_sis,$sql,$parametro);            
        sqlsrv_execute($stmt);
        if($stmt){
            $respuesta = array(
                'respuesta' => 'exito',
                'resultado_imagen' => $imagen_resultado
            );
        }else{
            $respuesta = array(
               'respuesta'=>'error'  
            );
        }
        sqlsrv_close($conn_sis);
    } catch (Exception $ex) {
        $respuesta = array(
          'respuesta' =>$e->getMessage()  
        );
    }
    die(json_encode($respuesta));
    
}
//Actualizar
if ($_POST['registro'] == 'actualizar') {
    
    include_once 'Conexion.php';

    $nombre_marca = $_POST['nombre'];

    $id_registro = $_POST['id_marca'];

    $directorio = "../img/marca/";
     
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
     
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }else {
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    
    try {
        if($_FILES['archivo_imagen']['size']>0){
        
        //con imagen
        $sql=" UPDATE marca SET nombre = ?, foto = ?,editado = GETDATE()  WHERE id_marca = ? ";
        $parametro = array(&$nombre_marca,&$imagen_url,&$id_registro);
        $stmt = sqlsrv_prepare($conn_sis,$sql,$parametro);

        }else{
         
        //sin imagen
        $sql=" UPDATE marca SET nombre = ?,editado = GETDATE() WHERE id_marca = ? ";
        $parametro = array(&$nombre_marca,&$id_registro);
        $stmt = sqlsrv_prepare($conn_sis,$sql,$parametro);

        }
        
        sqlsrv_execute($stmt);
            
        if($stmt){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        }else{  
            $respuesta= array(
                'respuesta' => 'error'
            );
        }
       sqlsrv_close($conn_sis);
    } catch (Exception $e) {
        $respuesta=array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}
//Eliminar
if ($_POST['registro'] == 'eliminar') {

    include_once 'Conexion.php';

    $id_borrar = $_POST['id'];

    try {
        $sql = "DELETE from marca WHERE id_marca = ? ";
        $parametro = array(&$id_borrar);
        $stmt = sqlsrv_prepare($conn_sis,$sql,$parametro);            
        sqlsrv_execute($stmt);

        if($stmt){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}


