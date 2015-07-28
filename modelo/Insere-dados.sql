-- -----------------------------------------------------
-- Data for table `OpenDojo`.`Sexo`
-- -----------------------------------------------------


INSERT INTO `OpenDojo`.`Sexo` (`idSexo`, `sexo`) VALUES (1, 'Masculino');
INSERT INTO `OpenDojo`.`Sexo` (`idSexo`, `sexo`) VALUES (2, 'Feminino');




-- -----------------------------------------------------
-- Data for table `OpenDojo`.`TipoContato`
-- -----------------------------------------------------


INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (1, 'Telefone Residencial');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (2, 'Telefone Celular');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (3, 'Telefone trabalho');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (4, 'Email');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (5, 'Facebook');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (6, 'Instagran');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (7, 'Twitter');




-- -----------------------------------------------------
-- Data for table `OpenDojo`.`ArteMarcial`
-- -----------------------------------------------------


INSERT INTO `OpenDojo`.`ArteMarcial` (`idArteMarcial`, `nomeArteMarcial`) VALUES (1, 'Sho Kumo Ryu Ninjutsu');




-- -----------------------------------------------------
-- Data for table `OpenDojo`.`Graduacao`
-- -----------------------------------------------------


INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('20º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('19º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('18º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('17º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('16º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('15º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('14º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('13º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('12º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('11º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('10º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('9º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('8º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('7º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('6º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('5º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('4º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('3º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('2º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('1º Kyu', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('2º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('3º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('4º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('5º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('6º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('7º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('8º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('9º Dan', 1);
INSERT INTO `OpenDojo`.`Graduacao` (`nomeGraduacao`, `ArteMarcial_idArte_Marcial`) VALUES ('10º Dan', 1);



-- -----------------------------------------------------
-- Data for table `OpenDojo`.`Grupo`
-- -----------------------------------------------------


INSERT INTO `OpenDojo`.`Grupo` (`idGrupo`, `nome`, `descricao`) VALUES (1, 'Administrador', 'Grupo com acesso as informações de todos os dojo');
INSERT INTO `OpenDojo`.`Grupo` (`idGrupo`, `nome`, `descricao`) VALUES (2, 'Professor', 'Grupo com acesso as informações de determinados dojo');




