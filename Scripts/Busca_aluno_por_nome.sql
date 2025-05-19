select tbaluno.tbaluno_id,
            tbaluno.tbaluno_nome, 
            tbaluno.tbaluno_dtnasc,
            tbaluno.tbaluno_turma,
            tbaluno.tbaluno_cep,
            tbaluno.tbaluno_status,
            tbaluno.tbaluno_recadastrado,
            tbfila.tbfila_id, 
            tbfila.tbaluno_tbaluno_id,
            tbfila.tbfila_turma,
            tbfila.tbfila_dtacad,
            tbfila.data_cadalterado,
            tbfila.tbfila_motivo,
            tbfila.tbcmei_tbcmcei_id,
            tbcmei.tbcmei_id, 
            tbfila.tbfila_ord,
            tbcmei.tbcmei_nome
             FROM tbaluno INNER JOIN tbfila 
             ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
             iNNER JOIN tbcmei 
             on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
             where tbfila_motivo like '%Normal%' 
             and tbaluno_turma = 'Inf1' 
             and tbcmei.tbcmei_id like '%38%' 
             and tbaluno_status ='Pendente'
             ORDER BY tbfila_id
			