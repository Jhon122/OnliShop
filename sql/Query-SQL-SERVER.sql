/**create database ONLISHOP*/
USE ONLISHOP
/*create table talla(
id_talla int identity(1,1),
medida char(4),
rango varchar(10),
creado datetime,
editado datetime,
constraint pk_id_talla primary key(id_talla)
)*/
/****/
create table subcategoria(
id_subcategoria int identity(1,1),
nombre varchar(30),
icono varchar(30),
creado datetime,
editado datetime,
constraint pk_id_subcategoria primary key(id_subcategoria)
)
/****/
create table categoria(
id_categoria int identity(1,1),
nombre varchar(30),
icono varchar(30),
creado datetime,
editado datetime,
constraint pk_id_categoria primary key(id_categoria)
)
/****/
create table marca(
id_marca int identity(1,1),
nombre varchar(45),
foto varchar(250),
editado datetime,
creado datetime,
constraint pk_id_marca primary key(id_marca)
)
/***/
create table producto(
id_producto int identity(1,1),
id_categoria int,
id_marca int,
subcategoria varchar(30),
tallas varchar(9),
codigo varchar(20),
nombre varchar(45),
precio_actual decimal(8,2),
precio_anterior decimal(8,2),
stock int,
genero varchar(20),
detalles varchar(150),
descripcion varchar(150),
foto_principal varchar(250),
fotos_secundarias varchar(300),
creado datetime,
editado datetime,
constraint pk_id_producto primary key(id_producto),
constraint fk_id_categoria foreign key(id_categoria) references categoria(id_categoria),
constraint fk_id_marca foreign key(id_marca)references marca(id_marca)
)
/****/
create table clientes(
id_cliente int identity(1,1),
nombre varchar(40),
apellido varchar(40),
direccion varchar(250),
telefono int,
dni int,
birth_date date,
CONSTRAINT PK_ID_CLIENTE PRIMARY KEY(id_cliente)
)
create table venta(
id_venta int identity(1,1),
id_cliente int,
fecha_venta date,
hora_venta time,
tipo_documento varchar(15),
cod_documento varchar(15),
CONSTRAINT PK_ID_VENTA PRIMARY KEY(id_venta),
CONSTRAINT FK_ID_CLIENTE FOREIGN KEY (ID_CLIENTE) REFERENCES CLIENTES(ID_CLIENTE)
)

select*from categoria
select*from marca
select*from producto
select*from talla
select*from subcategoria
/**TOP ULTIMOS**/
SELECT*FROM
(SELECT TOP 9 CREADO,ID_PRODUCTO,ID_CATEGORIA,ID_MARCA,ID_SUBCATEGORIA,TALLA,CODIGO,NOMBRE,PRECIO_UNITARIO,STOCK
 FROM PRODUCTO ORDER BY creado DESC)
A ORDER BY CREADO ASC
/** CONSULTAS **/
select p.id_producto,p.nombre,c.nombre,s.nombre ,m.nombre,
p.precio_unitario,p.stock,p.foto
from producto as p
inner join categoria as c
on p.id_categoria=c.id_categoria
inner join subcategoria as s
on p.id_subcategoria=s.id_subcategoria
inner join marca as m
on p.id_marca=m.id_marca
order by id_producto


INSERT INTO producto(id_categoria , id_marca , subcategoria , tallas , codigo ,
 nombre ,precio_actual , precio_anterior, stock ,genero ,detalles ,descripcion , foto_principal , creado) 
                VALUES (1,1,'Manga Corta','S','P_01','Polo de Flash',12,19,32,'Masculino',
                'Tela',
                'Poloder Super exclusivo para personas otakus,amantes de los dibujos animados',
                'polos1.jpg',GETDATE())
                select*from producto
                truncate table producto



                //
                SELECT * FROM (SELECT TOP 6 P.CREADO,P.ID_PRODUCTO,C.NOMBRE AS NOMBRE_CATEGORIA,P.TALLAS,P.NOMBRE,P.PRECIO_ACTUAL,P.DESCRIPCION,P.FOTO_PRINCIPAL
FROM PRODUCTO AS P 
INNER JOIN CATEGORIA AS C
ON P.ID_CATEGORIA=C.ID_CATEGORIA
ORDER BY creado DESC) A ORDER BY CREADO ASC

SELECT*FROM PRODUCTO
SELECT*FROM CATEGORIA
select p.id_producto,p.nombre,c.nombre,s.nombre ,m.nombre,
p.precio_unitario,p.stock,p.foto
from producto as p
inner join categoria as c
on p.id_categoria=c.id_categoria
inner join subcategoria as s
on p.id_subcategoria=s.id_subcategoria
inner join marca as m
on p.id_marca=m.id_marca
order by id_producto



/**UNION NEW PRODUCTS**/
	select * from 
	( select top 1 p.creado,p.id_producto,c.id_categoria,c.nombre as nombre_categoria,p.nombre as nombre_producto,
	p.foto_principal,p.precio_actual,p.precio_anterior
	 from producto as p 
	 inner join categoria as c
	 on p.id_categoria =c.id_categoria
	 where c.id_categoria=1 order by p.creado desc)
	 producto
union all
	select * from 
	( select top 1 p.creado,p.id_producto,c.id_categoria,c.nombre as nombre_categoria,p.nombre as nombre_producto,
	p.foto_principal,p.precio_actual,p.precio_anterior
	 from producto as p 
	 inner join categoria as c
	 on p.id_categoria =c.id_categoria
	 where c.id_categoria=2 order by p.creado desc)
	 producto
 union all
	select * from 
	( select top 1 p.creado,p.id_producto,c.id_categoria,c.nombre as nombre_categoria,p.nombre as nombre_producto,
	p.foto_principal,p.precio_actual,p.precio_anterior
	 from producto as p 
	 inner join categoria as c
	 on p.id_categoria =c.id_categoria
	 where c.id_categoria=3 order by p.creado desc)
	 producto
  union all
	select * from 
	( select top 1 p.creado,p.id_producto,c.id_categoria,c.nombre as nombre_categoria,p.nombre as nombre_producto,
	p.foto_principal,p.precio_actual,p.precio_anterior
	 from producto as p 
	 inner join categoria as c
	 on p.id_categoria =c.id_categoria
	 where c.id_categoria=4 order by p.creado desc)
	 producto
 union all
	select * from 
	( select top 1 p.creado,p.id_producto,c.id_categoria,c.nombre as nombre_categoria,p.nombre as nombre_producto,
	p.foto_principal,p.precio_actual,p.precio_anterior
	 from producto as p 
	 inner join categoria as c
	 on p.id_categoria =c.id_categoria
	 where c.id_categoria=5 order by p.creado desc)
	 producto
union all
	select * from 
	( select top 1 p.creado,p.id_producto,c.id_categoria,c.nombre as nombre_categoria,p.nombre as nombre_producto,
	p.foto_principal,p.precio_actual,p.precio_anterior
	 from producto as p 
	 inner join categoria as c
	 on p.id_categoria =c.id_categoria
	 where c.id_categoria=6 order by p.creado desc)
	 producto
