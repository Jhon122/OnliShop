/** Base de Datos **/
CREATE DATABASE onlishop

/** TABLAS **/

create table sub_categoria (
id_subcategoria int (11) AUTO_INCREMENT,
nombre varchar(50),
icono varchar(15),
creado datetime,
editado datetime,
constraint primary key (id_subcategoria)
)
create table categoria (
id_categoria int (11) AUTO_INCREMENT,
nombre varchar(50),
icono varchar(15),
creado datetime,
editado datetime,
constraint primary key (id_categoria)
)
create table talla(
id_talla int(11) AUTO_INCREMENT,
nombre varchar(23),
descripcion varchar(100),
creado datetime,
editado datetime,
constraint primary key(id_talla)
)
create table producto(
id_producto int(11) AUTO_INCREMENT,
codigo_producto varchar(11),
nombre
precio
stock
genero
descripcion
foto
creado
editado
)
create table marca(
id_marca int(11) AUTO_INCREMENT,
nombre varchar(45),

)