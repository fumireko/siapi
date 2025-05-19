select tbaluno.tbaluno_id,
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_status,
tbaluno.tbaluno_recadastrado,
tbrecadastramento.rec_id,
tbrecadastramento.rec_id_aluno,
tbrecadastramento.rec_status
from tbaluno inner join
tbrecadastramento on
tbaluno.tbaluno_id = tbrecadastramento.rec_id_aluno