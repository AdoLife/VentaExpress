create table compra(
	nu_compra int not null auto_increment primary key,
	fe_compra date not null,
	nu_cliente int not null,
	in_despacho char(1) not null,
	fe_despacho date,
	check (in_despacho in ('A','C','D')),
	foreign key (nu_cliente) references cliente (nu_cliente)
);

-- A: compra abierta; C: cerrada; D: despachada
