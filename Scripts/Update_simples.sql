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
    tbfila.data_cadalterado,
    tbfila.tbcmei_tbcmcei_id,
    tbfila.dados_usuarios_ID,
    tbcmei_tbcmcei_id, 
    tbfila.tbfila_ord,
    tbcmei.tbcmcei_id,
    tbcmei.tbcmei_nome
	FROM tbaluno INNER JOIN tbfila 
	ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
    iNNER JOIN tbcmei 
	on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmcei_id 
	where tbfila_motivo LIKE '%Trans%' 
	and tbfila_status Like '%fila%'
    and tbaluno.tbaluno_status = 'Pendente' 
   	ORDER BY tbfila_id