SELECT tbaluno.tbaluno_id,
    tbaluno.tbaluno_nome, 
    tbaluno.tbaluno_dtnasc,
    tbaluno.tbaluno_turma,
    tbaluno.tbaluno_cep,
    tbaluno_status,
    tbaluno_recadastrado,
    tbfila.tbfila_id, 
    tbfila.tbaluno_tbaluno_id,
    tbfila.tbfila_turma,
    tbfila.tbfila_dtacad,
    tbfila.data_cadalterado,
    tbfila.tbfila_motivo,
    tbfila.tbcmei_tbcmcei_id,
    tbfila.tbcmei_tbcmcei_id, 
    tbfila.tbfila_ord,
    tbcmei.tbcmei_nome
	FROM tbaluno INNER JOIN tbfila 
	ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
    iNNER JOIN tbcmei 
	on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmcei_id 
	where tbfila_motivo LIKE '%Normal%' 
	and tbaluno_turma like '%INF1%' 
	and tbcmei_tbcmcei_id like '%38%' 
	and tbfila_status Like '%fila%'
    and tbaluno.tbaluno_status = 'Pendente' 
    and tbaluno.tbaluno_recadastrado = 'Recadastrado'
	ORDER BY tbfila_id