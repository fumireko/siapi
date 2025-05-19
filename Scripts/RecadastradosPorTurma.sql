select distinct tbaluno.tbaluno_id,
tbaluno.tbaluno_nome, tbaluno.tbaluno_turma,
tbaluno.tbaluno_recadastrado
from tbaluno 
where tbaluno_recadastrado = 'Recadastrado' Or  tbaluno_recadastrado = 'Renovado'
Or tbaluno_recadastrado = 'Sim'
order by tbaluno_turma