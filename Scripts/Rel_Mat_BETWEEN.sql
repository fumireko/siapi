select tbaluno.tbaluno_id, 
tbaluno.tbaluno_nome,
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_datacad, 
tbaluno.tbaluno_status, 
tbfila.tbfila_id, 
tbfila.tbaluno_tbaluno_id,
tbfila.tbfila_dtamat,
tbfila.tbfila_dtacad, 
tbfila.tbfila_status
from tbaluno inner join tbfila 
on tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id
where tbaluno.tbaluno_status = 'matriculado'
and tbfila.tbfila_dtamat between '2019-01-01' And '2019-12-31'