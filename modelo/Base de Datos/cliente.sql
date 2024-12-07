create table cliente (
	nu_cliente int not null auto_increment primary key,
	nb_cliente varchar(50) not null,
	nu_cedula int not null unique,
	co_correo varchar(35) not null unique,
	co_clave varchar(35) not null
);
