select distinct tbaluno.tbaluno_id, tbaluno_nome, 
tbaluno.tbaluno_recadastrado,
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_turma,
tbfila.tbaluno_tbaluno_id,
tbfila.tbfila_motivo
from tbaluno
inner join tbfila
on tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id
where tbfila.tbfila_motivo like '%trans%'



SET SQL_SAFE_UPDATES=0;
UPDATE tbaluno  
INNER JOIN tbfila 
ON  tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id
Inner join tbrecadastramento
On tbaluno.tbaluno_id = tbrecadastramento.rec_id_aluno
SET tbaluno.tbaluno_recadastrado = 'Recadastrado' 
where tbfila.tbfila_motivo like '%Transf%'
and tbrecadastramento.rec_status like '%Recad%'




