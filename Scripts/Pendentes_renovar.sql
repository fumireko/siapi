SELECT tbaluno.tbaluno_id,
	tbaluno.tbaluno_nome,
    tbaluno.tbaluno_tel,
    tbaluno.celu,
	tbaluno.tbaluno_dtnasc,
	tbaluno.tbaluno_turma,
    tbaluno.tbaluno_recadastrado,
	tbfila.tbfila_id, 
	tbfila.tbaluno_tbaluno_id,
	tbfila.tbfila_turma,
	tbfila.tbfila_dtacad,
	 tbfila.data_cadalterado,
	 tbfila.tbfila_motivo,
     tbfila.tbcmei_tbcmcei_id,
	tbcmei_tbcmcei_id, 
	tbfila.tbfila_ord,
	tbcmei.tbcmcei_id,
	tbcmei.tbcmei_nome 
	FROM tbaluno INNER JOIN tbfila 
	ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
    INNER JOIN tbcmei 
	on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmcei_id 
	and tbcmei.tbcmcei_id ='42' 
	and tbfila_status ='fila'
    and tbaluno.tbaluno_status = 'Pendente'
    ORDER BY tbfila_id