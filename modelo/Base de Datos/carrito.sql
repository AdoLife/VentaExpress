

create table carrito (
	nu_cliente int not null,
	nu_producto int not null,
	fe_registro date default now(),
	primary key (nu_cliente,nu_producto),
	foreign key (nu_cliente) references cliente (nu_cliente),
	foreign key (nu_producto) references producto (nu_producto)
);

