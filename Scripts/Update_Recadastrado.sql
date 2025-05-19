select distinct tbaluno.tbaluno_id, tbaluno_nome, 
tbaluno.tbaluno_recadastrado,
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_turma,
tbrecadastramento.rec_id_aluno,
tbrecadastramento.rec_status,
tbrecadastramento.rec_cmei,
tbfila.tbaluno_tbaluno_id,
tbfila.tbfila_motivo
from tbaluno
inner join tbrecadastramento 
on tbaluno.tbaluno_id = tbrecadastramento.rec_id_aluno
inner join tbfila
on tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id
where tbfila.tbfila_motivo like '%trans%'



SET SQL_SAFE_UPDATES=0;
UPDATE tbrecadastramento  
INNER JOIN tbaluno 
ON  tbrecadastramento.rec_id_aluno = tbaluno.tbaluno_id
Set tbrecadastramento.rec_status = 'Recadastrado'
where tbaluno.tbaluno_recadastrado = 'Recadastrado'

tbrecadastramento