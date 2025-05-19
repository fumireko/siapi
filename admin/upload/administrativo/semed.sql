--
-- Indexes for table `tbcmei`
--
ALTER TABLE `tbcmei`
  ADD PRIMARY KEY (`tbcmei_id`), ADD UNIQUE KEY `tbcmei_nome` (`tbcmei_nome`), ADD KEY `fk_tbcmei_dados_usuarios1_idx` (`dados_usuarios_ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `nivel` (`nivel`);
