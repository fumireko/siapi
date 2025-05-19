select tbaluno.tbaluno_id,tbaluno.tbaluno_nome,tbaluno.tbaluno_dtnasc,tbaluno.tbaluno_turma
from tbaluno 

update tbaluno set tbaluno.tbaluno_turma = 'bbb' 
where tbaluno_dtnasc >= '2015-04-01' 
and tbaluno_id  >= '1'
and tbaluno_id < '10000';


update tbaluno set tbaluno.tbaluno_turma = 'm1'
where tbaluno_dtnasc >= '2014-04-01' and  tbaluno_dtnasc <= '2015-03-31' 
and tbaluno_id  >= '1'
and tbaluno_id < '10000';

update tbaluno set tbaluno.tbaluno_turma = 'm2'
where tbaluno_dtnasc <= '2014-03-31' 
and tbaluno_id  >= '1'
and tbaluno_id < '10000';

update tbaluno set tbaluno.tbaluno_turma = 'Outro'
where tbaluno_dtnasc <= '2013-03-31' 
and tbaluno_id  >= '1'
and tbaluno_id < '10000';


