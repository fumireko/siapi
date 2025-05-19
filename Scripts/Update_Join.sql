SET SQL_SAFE_UPDATES=0;
UPDATE tbaluno  
INNER JOIN tbrecadastramento 
ON  tbaluno.tbaluno_id = tbrecadastramento.rec_id_aluno
SET tbaluno.tbaluno_status = 'Pendente', 
tbaluno.tbaluno_recadastrado = 'Sim' 
where tbrecadastramento.rec_status = 'Renovado'



