
create view view_compra
	as
select
	c.*,
	x.nb_cliente,
	x.nu_cedula,
	x.co_correo,
	x.co_clave
from compra c
inner join cliente x using (nu_cliente)
;
