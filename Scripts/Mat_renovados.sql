SELECT tbaluno.tbaluno_id,
	tbaluno.tbaluno_nome, 
	tbaluno.tbaluno_dtnasc,
	tbaluno.tbaluno_turma,
    tbaluno.tbaluno_cep,
	tbfila.tbfila_id, 
	tbfila.tbaluno_tbaluno_id,
	tbfila.tbfila_turma,
	tbfila.tbfila_dtacad,
	 tbfila.data_cadalterado,
	 tbfila.tbfila_motivo,
     tbrecadastramento.rec_id,
     tbrecadastramento.rec_status,
     tbrecadastramento.rec_data,
	tbfila.tbcmei_tbcmcei_id,
	tbcmei_tbcmcei_id, 
	tbfila.tbfila_ord,
	tbcmei.tbcmcei_id,
	tbcmei.tbcmei_nome 
	FROM tbaluno INNER JOIN tbfila 
	ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
    inner join tbrecadastramento 
    on tbaluno.tbaluno_id = tbrecadastramento.rec_id
	INNER JOIN tbcmei 
	on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmcei_id 
	where tbfila_motivo LIKE '%NORM%' 
	and tbaluno_turma like '%INF%' 
	and tbcmei.tbcmcei_id  like '%12%' 
	and tbfila_status ='fila'
    and tbaluno.tbaluno_status = 'Pendente'
    and tbrecadastramento.rec_status = 'Renovado'
	ORDER BY tbfila_id