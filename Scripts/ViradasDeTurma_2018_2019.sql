select tbaluno.tbaluno_id,tbaluno.tbaluno_nome,tbaluno.tbaluno_dtnasc,tbaluno.tbaluno_turma
from tbaluno 

update tbaluno set tbaluno.tbaluno_turma = 'INF1' 
where tbaluno_dtnasc >= '2018-04-01' 
and tbaluno_id  >= '1'
and tbaluno_id < '27000';


update tbaluno set tbaluno.tbaluno_turma = 'INF2'
where tbaluno_dtnasc >= '2017-04-01' and  tbaluno_dtnasc <= '2018-03-31' 
and tbaluno_id  >= '1'
and tbaluno_id < '27000';

update tbaluno set tbaluno.tbaluno_turma = 'INF3'
where tbaluno_dtnasc >= '2016-04-01' and  tbaluno_dtnasc <= '2017-03-31' 
and tbaluno_id  >= '1'
and tbaluno_id < '27000';

update tbaluno set tbaluno.tbaluno_turma = 'INF4'
where tbaluno_dtnasc >= '2015-04-01' and  tbaluno_dtnasc <= '2016-03-31' 
and tbaluno_id  >= '1'
and tbaluno_id < '27000';

update tbaluno set tbaluno.tbaluno_turma = 'INF5'
where tbaluno_dtnasc >= '2014-04-01' and  tbaluno_dtnasc <= '2015-03-31'
and tbaluno_id  >= '1'
and tbaluno_id < '27000';

update tbaluno set tbaluno.tbaluno_turma = 'FUND'
where tbaluno_dtnasc < '2014-04-01'
and tbaluno_id  >= '1'
and tbaluno_id < '27000';

