select tbaluno.tbaluno_id, tbaluno.tbaluno_nome , tbaluno.tbaluno_dtnasc, tbaluno.tbaluno_turma, tbaluno.tbaluno_cep, tbaluno.tbaluno_cep, tbaluno.tbaluno_recadastrado, tbfila.tbfila_id, tbfila.tbcmei_tbcmcei_id, tbfila.tbaluno_tbaluno_id, tbfila.tbfila_turma, tbfila.tbfila_status, tbfila.tbfila_dtacad, tbfila.data_cadalterado, tbfila.tbfila_motivo, tbfila.tbfila_ord, tbcmei.tbcmei_nome 
from tbaluno  
INNER JOIN tbfila ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
INNER JOIN tbcmei ON tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmcei_id