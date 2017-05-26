CREATE TABLE cursos (
  idcursos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_curso VARCHAR(255) NULL,
  PRIMARY KEY(idcursos)
);

CREATE TABLE departamento (
  iddepartamento INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_departamento VARCHAR(255) NULL,
  PRIMARY KEY(iddepartamento)
);

CREATE TABLE diretor (
  iddiretor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  departamento_iddepartamento INTEGER UNSIGNED NOT NULL,
  nome_diretor VARCHAR(255) NULL,
  login_diretor VARCHAR(255) NULL,
  senha_diretor CHAR(10) NULL,
  endereco_diretor VARCHAR(255) NULL,
  telefone_diretor VARCHAR(255) NULL,
  email_diretor VARCHAR(255) NULL,
  imagem VARCHAR(255) NULL,
  PRIMARY KEY(iddiretor),
  INDEX diretor_FKIndex1(departamento_iddepartamento),
  FOREIGN KEY(departamento_iddepartamento)
    REFERENCES departamento(iddepartamento)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE operador (
  idoperador INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  diretor_iddiretor INTEGER UNSIGNED NOT NULL,
  nome_operador VARCHAR(255) NULL,
  setor_operador VARCHAR(255) NULL,
  login_operador VARCHAR(255) NULL,
  senha_operador CHAR(10) NULL,
  telefone_operador VARCHAR(255) NULL,
  email_operador VARCHAR(255) NULL,
  imagem VARCHAR(255) NULL,
  PRIMARY KEY(idoperador),
  INDEX operador_FKIndex1(diretor_iddiretor),
  FOREIGN KEY(diretor_iddiretor)
    REFERENCES diretor(iddiretor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE professor (
  idprofessor INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  diretor_iddiretor INTEGER UNSIGNED NOT NULL,
  login_professor VARCHAR(255) NULL,
  senha_professor CHAR(10) NULL,
  endereco_professor VARCHAR(255) NULL,
  telefone_professor VARCHAR(255) NULL,
  email_professor VARCHAR(255) NULL,
  imagem VARCHAR(255) NULL,
  PRIMARY KEY(idprofessor),
  INDEX professor_FKIndex1(diretor_iddiretor),
  FOREIGN KEY(diretor_iddiretor)
    REFERENCES diretor(iddiretor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE aluno (
  idaluno INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  operador_idoperador INTEGER UNSIGNED NOT NULL,
  nome_aluno VARCHAR(255) NULL,
  endereco_aluno VARCHAR(255) NULL,
  email_aluno VARCHAR(255) NULL,
  login_aluno VARCHAR(255) NULL,
  senha_aluno CHAR(10) NULL,
  telefone_aluno VARCHAR(255) NULL,
  situacao VARCHAR(255) NULL,
  imagem VARCHAR(255) NULL,
  PRIMARY KEY(idaluno),
  INDEX aluno_FKIndex1(operador_idoperador),
  FOREIGN KEY(operador_idoperador)
    REFERENCES operador(idoperador)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE cursos_detalhes (
  idcursos_detalhes INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cursos_idcursos INTEGER UNSIGNED NOT NULL,
  professor_idprofessor INTEGER UNSIGNED NOT NULL,
  aluno_idaluno INTEGER UNSIGNED NOT NULL,
  nome_curso VARCHAR(255) NULL,
  preco_curso DECIMAL(15,2) NULL,
  duracao_curso VARCHAR(255) NULL,
  grau_curso VARCHAR(255) NULL,
  PRIMARY KEY(idcursos_detalhes),
  INDEX cursos_FKIndex1(aluno_idaluno),
  INDEX cursos_FKIndex2(professor_idprofessor),
  INDEX cursos_detalhes_FKIndex3(cursos_idcursos),
  FOREIGN KEY(aluno_idaluno)
    REFERENCES aluno(idaluno)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(professor_idprofessor)
    REFERENCES professor(idprofessor)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cursos_idcursos)
    REFERENCES cursos(idcursos)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE disciplinas (
  iddisciplinas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cursos_detalhes_idcursos_detalhes INTEGER UNSIGNED NOT NULL,
  nome_disciplinas VARCHAR(255) NULL,
  PRIMARY KEY(iddisciplinas),
  INDEX disciplinas_FKIndex1(cursos_detalhes_idcursos_detalhes),
  FOREIGN KEY(cursos_detalhes_idcursos_detalhes)
    REFERENCES cursos_detalhes(idcursos_detalhes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE turnos (
  idturnos INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cursos_detalhes_idcursos_detalhes INTEGER UNSIGNED NOT NULL,
  turno VARCHAR(255) NULL,
  PRIMARY KEY(idturnos),
  INDEX turnos_FKIndex1(cursos_detalhes_idcursos_detalhes),
  FOREIGN KEY(cursos_detalhes_idcursos_detalhes)
    REFERENCES cursos_detalhes(idcursos_detalhes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE turmas (
  idturmas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cursos_detalhes_idcursos_detalhes INTEGER UNSIGNED NOT NULL,
  turma_semeste INTEGER UNSIGNED NULL,
  sala VARCHAR(255) NULL,
  PRIMARY KEY(idturmas),
  INDEX turmas_FKIndex1(cursos_detalhes_idcursos_detalhes),
  FOREIGN KEY(cursos_detalhes_idcursos_detalhes)
    REFERENCES cursos_detalhes(idcursos_detalhes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE boleto (
  idboleto INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cursos_detalhes_idcursos_detalhes INTEGER UNSIGNED NOT NULL,
  porcentagem_boleto_semestre INTEGER UNSIGNED NULL,
  PRIMARY KEY(idboleto),
  INDEX boleto_FKIndex1(cursos_detalhes_idcursos_detalhes),
  FOREIGN KEY(cursos_detalhes_idcursos_detalhes)
    REFERENCES cursos_detalhes(idcursos_detalhes)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE boletim (
  idboletim INTEGER NOT NULL AUTO_INCREMENT,
  disciplinas_iddisciplinas INTEGER UNSIGNED NOT NULL,
  av1 INTEGER NULL,
  av2 INTEGER NULL,
  av3 INTEGER NULL,
  unica INTEGER NULL,
  media INTEGER NULL,
  situacao VARCHAR(255) NULL,
  PRIMARY KEY(idboletim),
  INDEX boletim_FKIndex1(disciplinas_iddisciplinas),
  FOREIGN KEY(disciplinas_iddisciplinas)
    REFERENCES disciplinas(iddisciplinas)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE arquivos_apoio (
  idarquivos_apoio INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  disciplinas_iddisciplinas INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(idarquivos_apoio),
  INDEX arquivos_apoio_FKIndex1(disciplinas_iddisciplinas),
  FOREIGN KEY(disciplinas_iddisciplinas)
    REFERENCES disciplinas(iddisciplinas)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


