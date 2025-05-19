SELECT tbaluno.tbaluno_id,
       tbaluno.tbaluno_nome, 
       tbaluno.tbaluno_dtnasc,
       tbaluno.tbaluno_turma,
       tbaluno.tbaluno_cep,
       tbaluno.tbaluno_status,
       tbtran.tbtran_id,
       tbtran.tbtran_idcmeiant,
       tbtran.tbtran_dtatran,
       tbtran.tbtran_status,
	   tbtran.tbaluno_tbaluno_id,
       tbtran.cmei_antigo,
       tbtran.tbcmei_tbcmcei_id,
       tbtran.dados_usuarios_ID,
       tbcmei.tbcmei_id, 
       tbcmei.tbcmei_nome
       FROM tbaluno INNER JOIN tbtran 
       ON tbaluno.tbaluno_id = tbtran.tbaluno_tbaluno_id 
       iNNER JOIN tbcmei 
       on tbtran.tbcmei_tbcmcei_id = tbcmei.tbcmei_id
  
 