create view view_detalle_compra
as
	select
		dc.nu_detalle,
		co.nu_compra,
		co.fe_compra,
		co.in_despacho,
		co.fe_despacho,
		c.*,
		p.*,
		t.nb_categoria,
		dc.ca_producto,
		dc.fe_registro
	from detalle_compra dc
	inner join compra co using (nu_compra)
	inner join cliente c using (nu_cliente)
	inner join producto p using (nu_producto)
	inner join categoria t using (nu_categoria)
;