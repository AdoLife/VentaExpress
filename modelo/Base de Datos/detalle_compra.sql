create table detalle_compra(
	nu_detalle int not null auto_increment primary key,
	nu_compra int not null,
	nu_producto int not null,
	ca_producto int not null,
	fe_registro date not null,
	unique (nu_compra,nu_producto),
	foreign key (nu_compra) references compra (nu_compra),
	foreign key (nu_producto) references producto (nu_producto)
);
