

create view view_producto
	as
select 
	p.*, c.nb_categoria
from producto p
inner join categoria c using (nu_categoria)
;


