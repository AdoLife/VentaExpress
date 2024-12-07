create view view_carrito
as
	select
		c.*, 
		p.*, 
		t.nb_categoria,
		x.fe_registro
	from carrito x
	inner join cliente c using (nu_cliente)
	inner join producto p using (nu_producto)
	inner join categoria t using (nu_categoria)
;
