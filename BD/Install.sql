
CREATE SCHEMA IF NOT EXISTS `OpenDojo` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `OpenDojo` ;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Pessoa` (
  `idPessoa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `dataNascimento` DATE NOT NULL,
  `nomeMae` VARCHAR(100) NOT NULL,
  `nomePai` VARCHAR(100) NULL,
  `logradouro` VARCHAR(100) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `complemento` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `rg` VARCHAR(45) NULL,
  `cpf` VARCHAR(45) NULL,
  `Sexo_idSexo` INT NOT NULL,
  PRIMARY KEY (`idPessoa`, `Sexo_idSexo`),
  INDEX `fk_Pessoa_Sexo1_idx` (`Sexo_idSexo` ASC),
  CONSTRAINT `fk_Pessoa_Sexo1`
    FOREIGN KEY (`Sexo_idSexo`)
    REFERENCES `OpenDojo`.`Sexo` (`idSexo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`TipoContato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`TipoContato` (
  `idTipoContato` INT NOT NULL AUTO_INCREMENT,
  `tipoContato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTipoContato`))
ENGINE = InnoDB;



INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (1, 'Telefone residencial');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (2, 'Telefone profissional');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (3, 'Celular');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (4, 'Email');
INSERT INTO `OpenDojo`.`TipoContato` (`idTipoContato`, `tipoContato`) VALUES (5, 'Facebook');




-- -----------------------------------------------------
-- Table `OpenDojo`.`Contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Contato` (
  `idContato` INT NOT NULL AUTO_INCREMENT,
  `TipoContato_idTipoContato` INT NOT NULL,
  `dadoContato` VARCHAR(200) NULL,
  `Pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`idContato`, `TipoContato_idTipoContato`, `Pessoa_idPessoa`),
  INDEX `fk_contato_tipoContato_idx` (`TipoContato_idTipoContato` ASC),
  INDEX `fk_contato_Pessoa1_idx` (`Pessoa_idPessoa` ASC),
  CONSTRAINT `fk_contato_tipoContato`
    FOREIGN KEY (`TipoContato_idTipoContato`)
    REFERENCES `OpenDojo`.`TipoContato` (`idTipoContato`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contato_Pessoa1`
    FOREIGN KEY (`Pessoa_idPessoa`)
    REFERENCES `OpenDojo`.`Pessoa` (`idPessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`ArteMarcial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`ArteMarcial` (
  `idArteMarcial` INT NOT NULL AUTO_INCREMENT,
  `nomeArteMarcial` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idArteMarcial`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Graduacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Graduacao` (
  `idGraduacao` INT NOT NULL AUTO_INCREMENT,
  `nomeGraduacao` VARCHAR(45) NULL,
  `ArteMarcial_idArte_Marcial` INT NOT NULL,
  PRIMARY KEY (`idGraduacao`, `ArteMarcial_idArte_Marcial`),
  INDEX `fk_Graduacao_ArteMarcial1_idx` (`ArteMarcial_idArte_Marcial` ASC),
  CONSTRAINT `fk_Graduacao_ArteMarcial1`
    FOREIGN KEY (`ArteMarcial_idArte_Marcial`)
    REFERENCES `OpenDojo`.`ArteMarcial` (`idArteMarcial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Academia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Academia` (
  `idAcademia` INT NOT NULL AUTO_INCREMENT,
  `nomeAcademia` VARCHAR(100) NOT NULL,
  `logradouro` VARCHAR(100) NULL,
  `numero` VARCHAR(45) NULL,
  `complemento` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idAcademia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Dojo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Dojo` (
  `idDojo` INT NOT NULL AUTO_INCREMENT,
  `nomeDojo` VARCHAR(100) NOT NULL,
  `ArteMarcial_idArte_Marcial` INT NOT NULL,
  `Academia_idAcademia` INT NOT NULL,
  PRIMARY KEY (`idDojo`, `ArteMarcial_idArte_Marcial`, `Academia_idAcademia`),
  INDEX `fk_Dojo_ArteMarcial1_idx` (`ArteMarcial_idArte_Marcial` ASC),
  INDEX `fk_Dojo_Academia1_idx` (`Academia_idAcademia` ASC),
  CONSTRAINT `fk_Dojo_ArteMarcial1`
    FOREIGN KEY (`ArteMarcial_idArte_Marcial`)
    REFERENCES `OpenDojo`.`ArteMarcial` (`idArteMarcial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Dojo_Academia1`
    FOREIGN KEY (`Academia_idAcademia`)
    REFERENCES `OpenDojo`.`Academia` (`idAcademia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Exame`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Exame` (
  `idExame` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `ArteMarcial_idArte Marcial` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idExame`, `ArteMarcial_idArte Marcial`),
  INDEX `fk_Exame_ArteMarcial1_idx` (`ArteMarcial_idArte Marcial` ASC),
  CONSTRAINT `fk_Exame_ArteMarcial1`
    FOREIGN KEY (`ArteMarcial_idArte Marcial`)
    REFERENCES `OpenDojo`.`ArteMarcial` (`idArteMarcial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Aluno` (
  `idAluno` INT NOT NULL AUTO_INCREMENT,
  `ativo` TINYINT NOT NULL COMMENT '1 - Ativo\n2 - Inativo',
  `Pessoa_idPessoa` INT NOT NULL,
  PRIMARY KEY (`idAluno`, `Pessoa_idPessoa`),
  INDEX `fk_Aluno_Pessoa1_idx` (`Pessoa_idPessoa` ASC),
  CONSTRAINT `fk_Aluno_Pessoa1`
    FOREIGN KEY (`Pessoa_idPessoa`)
    REFERENCES `OpenDojo`.`Pessoa` (`idPessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Turma` (
  `idTurma` INT NOT NULL AUTO_INCREMENT,
  `nomeTurma` VARCHAR(45) NOT NULL,
  `ativo` TINYINT NOT NULL COMMENT '1 - Ativo\n2 - Inativo',
  `Dojo_idDojo` INT NOT NULL,
  PRIMARY KEY (`idTurma`, `Dojo_idDojo`),
  INDEX `fk_Turma_Dojo1_idx` (`Dojo_idDojo` ASC),
  CONSTRAINT `fk_Turma_Dojo1`
    FOREIGN KEY (`Dojo_idDojo`)
    REFERENCES `OpenDojo`.`Dojo` (`idDojo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Horario` (
  `idHorario` INT NOT NULL AUTO_INCREMENT,
  `diaSemana` TINYINT NOT NULL,
  `horaInicio` TIME NOT NULL,
  `horaFim` TIME NOT NULL,
  `Turma_idTurma` INT NOT NULL,
  PRIMARY KEY (`idHorario`, `Turma_idTurma`),
  INDEX `fk_Horario_Turma1_idx` (`Turma_idTurma` ASC),
  CONSTRAINT `fk_Horario_Turma1`
    FOREIGN KEY (`Turma_idTurma`)
    REFERENCES `OpenDojo`.`Turma` (`idTurma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Aluno_Pertence_Turma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Aluno_Pertence_Turma` (
  `Aluno_idAluno` INT NOT NULL,
  `Aluno_Pessoa_idPessoa` INT NOT NULL,
  `Turma_idTurma` INT NOT NULL,
  `ativo` TINYINT NOT NULL COMMENT '1 - Ativo\n2 - Inativo',
  PRIMARY KEY (`Aluno_idAluno`, `Aluno_Pessoa_idPessoa`, `Turma_idTurma`),
  INDEX `fk_Aluno_has_Turma_Turma1_idx` (`Turma_idTurma` ASC),
  INDEX `fk_Aluno_has_Turma_Aluno1_idx` (`Aluno_idAluno` ASC, `Aluno_Pessoa_idPessoa` ASC),
  CONSTRAINT `fk_Aluno_has_Turma_Aluno1`
    FOREIGN KEY (`Aluno_idAluno` , `Aluno_Pessoa_idPessoa`)
    REFERENCES `OpenDojo`.`Aluno` (`idAluno` , `Pessoa_idPessoa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_has_Turma_Turma1`
    FOREIGN KEY (`Turma_idTurma`)
    REFERENCES `OpenDojo`.`Turma` (`idTurma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Aula` (
  `idAula` INT NOT NULL AUTO_INCREMENT,
  `data` DATE NOT NULL,
  `relatorio` TEXT NULL,
  `Horario_idHorario` INT NOT NULL,
  PRIMARY KEY (`idAula`, `Horario_idHorario`),
  INDEX `fk_Aula_Horario1_idx` (`Horario_idHorario` ASC),
  CONSTRAINT `fk_Aula_Horario1`
    FOREIGN KEY (`Horario_idHorario`)
    REFERENCES `OpenDojo`.`Horario` (`idHorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Aluno_Frequenta_Aula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Aluno_Frequenta_Aula` (
  `Aula_idAula` INT NOT NULL,
  `Aluno_idAluno` INT NOT NULL,
  PRIMARY KEY (`Aula_idAula`, `Aluno_idAluno`),
  INDEX `fk_Aula_has_Aluno_Aluno1_idx` (`Aluno_idAluno` ASC),
  INDEX `fk_Aula_has_Aluno_Aula1_idx` (`Aula_idAula` ASC),
  CONSTRAINT `fk_Aula_has_Aluno_Aula1`
    FOREIGN KEY (`Aula_idAula`)
    REFERENCES `OpenDojo`.`Aula` (`idAula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aula_has_Aluno_Aluno1`
    FOREIGN KEY (`Aluno_idAluno`)
    REFERENCES `OpenDojo`.`Aluno` (`idAluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nomeUsuario` VARCHAR(100) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Grupo` (
  `idGrupo` INT NOT NULL AUTO_INCREMENT,
  `nomeGrupo` VARCHAR(45) NULL,
  `descricao` VARCHAR(100) NULL,
  PRIMARY KEY (`idGrupo`))
ENGINE = InnoDB;


INSERT INTO `OpenDojo`.`Grupo` (`idGrupo`, `nomeGrupo`, `descricao`) VALUES (1, 'Administrador', 'Grupo com acesso as informações de todos os dojo');
INSERT INTO `OpenDojo`.`Grupo` (`idGrupo`, `nomeGrupo`, `descricao`) VALUES (2, 'Professor', 'Grupo com acesso as informações de determinados dojo');




-- -----------------------------------------------------
-- Table `OpenDojo`.`Aluno_Possui_Graduacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Aluno_Possui_Graduacao` (
  `Aluno_idAluno` INT NOT NULL,
  `Graduacao_idGraduacao` INT ZEROFILL NOT NULL,
  PRIMARY KEY (`Aluno_idAluno`, `Graduacao_idGraduacao`),
  INDEX `fk_Aluno_has_Graduacao_Graduacao1_idx` (`Graduacao_idGraduacao` ASC),
  INDEX `fk_Aluno_has_Graduacao_Aluno1_idx` (`Aluno_idAluno` ASC),
  CONSTRAINT `fk_Aluno_has_Graduacao_Aluno1`
    FOREIGN KEY (`Aluno_idAluno`)
    REFERENCES `OpenDojo`.`Aluno` (`idAluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_has_Graduacao_Graduacao1`
    FOREIGN KEY (`Graduacao_idGraduacao`)
    REFERENCES `OpenDojo`.`Graduacao` (`idGraduacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Aluno_Presta_Exame`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Aluno_Presta_Exame` (
  `Exame_idExame` INT NOT NULL,
  `Aluno_idAluno` INT NOT NULL,
  `nota` FLOAT NULL,
  `observacao` TEXT NULL,
  `Graduacao_idGraduacao_Inicial` INT ZEROFILL NOT NULL,
  `Graduacao_idGraduacao_Promovido` INT ZEROFILL NULL,
  PRIMARY KEY (`Exame_idExame`, `Aluno_idAluno`, `Graduacao_idGraduacao_Inicial`, `Graduacao_idGraduacao_Promovido`),
  INDEX `fk_Exame_has_Aluno_Aluno1_idx` (`Aluno_idAluno` ASC),
  INDEX `fk_Exame_has_Aluno_Exame1_idx` (`Exame_idExame` ASC),
  INDEX `fk_Aluno_Presta_Exame_Graduacao1_idx` (`Graduacao_idGraduacao_Inicial` ASC),
  INDEX `fk_Aluno_Presta_Exame_Graduacao2_idx` (`Graduacao_idGraduacao_Promovido` ASC),
  CONSTRAINT `fk_Exame_has_Aluno_Exame1`
    FOREIGN KEY (`Exame_idExame`)
    REFERENCES `OpenDojo`.`Exame` (`idExame`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Exame_has_Aluno_Aluno1`
    FOREIGN KEY (`Aluno_idAluno`)
    REFERENCES `OpenDojo`.`Aluno` (`idAluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_Presta_Exame_Graduacao1`
    FOREIGN KEY (`Graduacao_idGraduacao_Inicial`)
    REFERENCES `OpenDojo`.`Graduacao` (`idGraduacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_Presta_Exame_Graduacao2`
    FOREIGN KEY (`Graduacao_idGraduacao_Promovido`)
    REFERENCES `OpenDojo`.`Graduacao` (`idGraduacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `OpenDojo`.`Usuario_Pertence_Grupo_Em_Dojo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `OpenDojo`.`Usuario_Pertence_Grupo_Em_Dojo` (
  `Usuario_idUsuario` INT NOT NULL,
  `Grupo_idGrupo` INT NOT NULL,
  `Dojo_idDojo` INT NOT NULL,
  PRIMARY KEY (`Usuario_idUsuario`, `Grupo_idGrupo`, `Dojo_idDojo`),
  INDEX `fk_Usuario_has_Grupo_Grupo1_idx` (`Grupo_idGrupo` ASC),
  INDEX `fk_Usuario_has_Grupo_Usuario1_idx` (`Usuario_idUsuario` ASC),
  INDEX `fk_Usuario_Pertence_Grupo_Em_Dojo_Dojo1_idx` (`Dojo_idDojo` ASC),
  CONSTRAINT `fk_Usuario_has_Grupo_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `OpenDojo`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Grupo_Grupo1`
    FOREIGN KEY (`Grupo_idGrupo`)
    REFERENCES `OpenDojo`.`Grupo` (`idGrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Pertence_Grupo_Em_Dojo_Dojo1`
    FOREIGN KEY (`Dojo_idDojo`)
    REFERENCES `OpenDojo`.`Dojo` (`idDojo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;







