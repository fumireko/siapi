SET SQL_SAFE_UPDATES=0;
DELETE tbfila FROM tbfila 
INNER JOIN tbaluno 
ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
WHERE tbaluno.tbaluno_recadastrado = ''
and tbfila.tbfila_dtacad < '2019-07-10'
and tbaluno.tbaluno_status != 'matriculado'

