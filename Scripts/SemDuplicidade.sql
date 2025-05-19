SELECT distinct tbaluno.tbaluno_id,
            tbaluno.tbaluno_nome, 
            tbaluno.tbaluno_dtnasc,
            tbaluno.tbaluno_turma,
            tbaluno.tbaluno_cep,
            tbaluno.tbaluno_status,
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
             and tbfila_status ='fila'
             and tbaluno_status = 'pendente'
             ORDER BY tbfila_id