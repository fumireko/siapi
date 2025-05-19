select tbaluno.tbaluno_id,
tbaluno.tbaluno_nome,
tbaluno.tbaluno_recadastrado,
tbrecadastramento.rec_id_aluno,
tbrecadastramento.rec_status,
tbrecadastramento.rec_cmei
from tbaluno
inner join tbrecadastramento 
on tbaluno.tbaluno_id = tbrecadastramento.rec_id_aluno
