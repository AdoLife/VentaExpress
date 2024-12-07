create table producto (
	nu_producto int not null auto_increment primary key,
	nb_producto varchar(50) not null,
	de_producto text not null,
	va_precio numeric(10) not null,
	ca_existencia int not null,
	nb_imagen varchar(35) not null,
	nu_categoria int not null,
	foreign key (nu_categoria) references categoria (nu_categoria),
	unique (nb_producto,nu_categoria),
	check (ca_existencia >= 0)
);