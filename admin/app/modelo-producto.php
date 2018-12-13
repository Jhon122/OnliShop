<?php
//Guardar
if($_POST['registro'] == 'nuevo'){
    
    include_once 'Conexion.php';

    $producto_categoria = $_POST['categoria'];
    $producto_marca = $_POST['marca'];
    $producto_subcategoria = $_POST['subcategoria'];
    $talla = $_POST['talla'];
    $codigo = $_POST['codigo_producto'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_actual = $_POST['precio_actual'];
    $precio_anterior = $_POST['precio_anterior'];
    $stock = $_POST['stock'];
    $genero = $_POST['genero'];
    $detalles = $_POST['detalles'];
    $descripcion = $_POST['descripcion'];

    $directorio = "../img/producto/";
     
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }
    try{
        $sql = "INSERT INTO producto(id_categoria,id_marca,subcategoria,tallas,codigo, nombre,precio_actual,precio_anterior,stock,genero,detalles,descripcion,foto_principal,creado) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,GETDATE())";
        $parametro = array(&$producto_categoria,&$producto_marca,&$producto_subcategoria,&$talla,&$codigo,&$nombre_producto,&$precio_actual,&$precio_anterior,&$stock,&$genero,&$detalles,&$descripcion,&$imagen_url);

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
        
    } catch (Exception $ex) {
        $respuesta = array(
          'respuesta' =>$e->getMessage()  
        );
    }
    die(json_encode($respuesta));
    
}
//Actualizar
if($_POST['registro'] == 'actualizar'){

    /*
    $respuesta = array(
    'post'=> $_POST,
    'file'=> $_FILES
    );
    die(json_encode($respuesta));
    */

    include_once 'Conexion.php';

    $nombre_categoria = $_POST['categoria_producto'];
    $nombre_marca = $_POST['marca_producto'];
    $subcategoria = $_POST['subcategoria'];
    $tallas = $_POST['tallas'];
    $codigo = $_POST['codigo'];
    $nombre_producto = $_POST['nombre_producto'];
    $precio_actual = $_POST['precio_actual'];
    $precio_anterior = $_POST['precio_anterior'];
    $stock = $_POST['stock'];
    $genero = $_POST['genero'];
    $detalles = $_POST['detalles'];
    $descripcion = $_POST['descripcion'];
    $id_registro = $_POST['id_producto'];

    $directorio = "../img/producto/";


    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])) {
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subió correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }
    try{

        if($_FILES['archivo_imagen']['size']>0){

        //Con imagen
        $sql = "UPDATE producto set id_categoria = ?, id_marca = ?, subcategoria = ?, tallas = ?, ";
        $sql.= " codigo = ?, nombre = ?, precio_actual = ?, precio_anterior = ?, stock = ?, genero = ?, ";
        $sql.= " detalles = ?, descripcion = ?, foto_principal = ?, editado = GETDATE()";
        $sql.= " WHERE id_producto = ? ";
        $parametro = array(&$nombre_categoria,&$nombre_marca,&$subcategoria,&$tallas,&$codigo,&$nombre_producto,&$precio_actual,
            &$precio_anterior,&$stock,&$genero,&$detalles,&$descripcion,&$imagen_url,&$id_registro);
        $stmt = sqlsrv_prepare($conn_sis,$sql,$parametro);

        }else{

        //Sin imagen
        $sql = "UPDATE producto set id_categoria = ?, id_marca = ?, subcategoria = ?, tallas = ?, ";
        $sql.= " codigo = ?, nombre = ?, precio_actual = ?, precio_anterior = ?, stock = ?, genero = ?, ";
        $sql.= " detalles = ?, descripcion = ?, editado = GETDATE()";
        $sql.= " WHERE id_producto = ? ";
        $parametro = array(&$nombre_categoria,&$nombre_marca,&$subcategoria,&$tallas,&$codigo,&$nombre_producto,&$precio_actual,
            &$precio_anterior,&$stock,&$genero,&$detalles,&$descripcion,&$id_registro);
        $stmt = sqlsrv_prepare($conn_sis,$sql,$parametro);

        }
        
        sqlsrv_execute($stmt);

        if($stmt){
            $respuesta = array(
                'respuesta' => 'exito',
                'resultado_imagen' => $id_registro
            );
        }else{
            $respuesta = array(
               'respuesta'=>'error'  
            );
        }
        
    } catch (Exception $ex) {
        $respuesta = array(
          'respuesta' =>$e->getMessage()  
        );
    }
    die(json_encode($respuesta));
    
}
//Eliminar
if ($_POST['registro'] == 'eliminar') {

    include_once 'Conexion.php';

    $id_borrar = $_POST['id'];

    try {
        $sql = " DELETE from producto WHERE id_producto = ? ";
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
