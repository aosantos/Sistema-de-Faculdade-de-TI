
CREATE DATABASE IF NOT EXISTS `oliveira` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `oliveira`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idaluno` int(10) UNSIGNED NOT NULL,
  `operador_idoperador` int(10) UNSIGNED NOT NULL,
  `nome_aluno` varchar(255) DEFAULT NULL,
  `endereco_aluno` varchar(255) DEFAULT NULL,
  `email_aluno` varchar(255) DEFAULT NULL,
  `login_aluno` varchar(255) DEFAULT NULL,
  `senha_aluno` char(10) DEFAULT NULL,
  `telefone_aluno` varchar(255) DEFAULT NULL,
  `situacao` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `cpf` varchar(13) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `media` varchar(45) DEFAULT NULL,
  `estado_civil` varchar(255) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos_apoio`
--

CREATE TABLE `arquivos_apoio` (
  `idarquivos_apoio` int(10) UNSIGNED NOT NULL,
  `disciplinas_iddisciplinas` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `boletim`
--

CREATE TABLE `boletim` (
  `idboletim` int(11) NOT NULL,
  `disciplinas_iddisciplinas` int(10) UNSIGNED NOT NULL,
  `av1` int(11) DEFAULT NULL,
  `av2` int(11) DEFAULT NULL,
  `av3` int(11) DEFAULT NULL,
  `unica` int(11) DEFAULT NULL,
  `media` int(11) DEFAULT NULL,
  `situacao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto`
--

CREATE TABLE `boleto` (
  `idboleto` int(10) UNSIGNED NOT NULL,
  `cursos_detalhes_idcursos_detalhes` int(10) UNSIGNED NOT NULL,
  `porcentagem_boleto_semestre` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `idcursos` int(10) UNSIGNED NOT NULL,
  `nome_curso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos_detalhes`
--

CREATE TABLE `cursos_detalhes` (
  `idcursos_detalhes` int(10) UNSIGNED NOT NULL,
  `cursos_idcursos` int(10) UNSIGNED NOT NULL,
  `aluno_idaluno` int(10) UNSIGNED NOT NULL,
  `semestre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos_itens`
--

CREATE TABLE `cursos_itens` (
  `idcursos_itens` int(11) NOT NULL,
  `cursos_idcuros` int(11) DEFAULT NULL,
  `preco` decimal(15,2) DEFAULT NULL,
  `duracao` varchar(45) DEFAULT NULL,
  `grau` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(10) UNSIGNED NOT NULL,
  `nome_departamento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `diretor`
--

CREATE TABLE `diretor` (
  `iddiretor` int(10) UNSIGNED NOT NULL,
  `departamento_iddepartamento` int(10) UNSIGNED NOT NULL,
  `nome_diretor` varchar(255) DEFAULT NULL,
  `login_diretor` varchar(255) DEFAULT NULL,
  `senha_diretor` char(10) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `telefone_diretor` varchar(255) DEFAULT NULL,
  `email_diretor` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `iddisciplinas` int(10) UNSIGNED NOT NULL,
  `cursos_detalhes_idcursos_detalhes` int(10) UNSIGNED NOT NULL,
  `nome_disciplinas` varchar(255) DEFAULT NULL,
  `idprofessor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `operador`
--

CREATE TABLE `operador` (
  `idoperador` int(10) UNSIGNED NOT NULL,
  `diretor_iddiretor` int(10) UNSIGNED NOT NULL,
  `nome_operador` varchar(255) DEFAULT NULL,
  `setor_operador` varchar(255) DEFAULT NULL,
  `login_operador` varchar(255) DEFAULT NULL,
  `senha_operador` char(10) DEFAULT NULL,
  `telefone_operador` varchar(255) DEFAULT NULL,
  `email_operador` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idprofessor` int(10) UNSIGNED NOT NULL,
  `diretor_iddiretor` int(10) UNSIGNED NOT NULL,
  `login_professor` varchar(255) DEFAULT NULL,
  `senha_professor` char(10) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `telefone_professor` varchar(255) DEFAULT NULL,
  `email_professor` varchar(255) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `cep` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `nome_professor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `idturmas` int(10) UNSIGNED NOT NULL,
  `cursos_detalhes_idcursos_detalhes` int(10) UNSIGNED NOT NULL,
  `turma_semeste` int(10) UNSIGNED DEFAULT NULL,
  `sala` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turnos`
--

CREATE TABLE `turnos` (
  `idturnos` int(10) UNSIGNED NOT NULL,
  `cursos_detalhes_idcursos_detalhes` int(10) UNSIGNED NOT NULL,
  `turno` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idaluno`),
  ADD KEY `aluno_FKIndex1` (`operador_idoperador`);

--
-- Indexes for table `arquivos_apoio`
--
ALTER TABLE `arquivos_apoio`
  ADD PRIMARY KEY (`idarquivos_apoio`);

--
-- Indexes for table `boletim`
--
ALTER TABLE `boletim`
  ADD PRIMARY KEY (`idboletim`);

--
-- Indexes for table `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`idboleto`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcursos`);

--
-- Indexes for table `cursos_detalhes`
--
ALTER TABLE `cursos_detalhes`
  ADD PRIMARY KEY (`idcursos_detalhes`);

--
-- Indexes for table `cursos_itens`
--
ALTER TABLE `cursos_itens`
  ADD PRIMARY KEY (`idcursos_itens`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indexes for table `diretor`
--
ALTER TABLE `diretor`
  ADD PRIMARY KEY (`iddiretor`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`iddisciplinas`);

--
-- Indexes for table `operador`
--
ALTER TABLE `operador`
  ADD PRIMARY KEY (`idoperador`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idprofessor`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`idturmas`);

--
-- Indexes for table `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`idturnos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idaluno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `arquivos_apoio`
--
ALTER TABLE `arquivos_apoio`
  MODIFY `idarquivos_apoio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boletim`
--
ALTER TABLE `boletim`
  MODIFY `idboletim` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `boleto`
--
ALTER TABLE `boleto`
  MODIFY `idboleto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcursos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cursos_detalhes`
--
ALTER TABLE `cursos_detalhes`
  MODIFY `idcursos_detalhes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cursos_itens`
--
ALTER TABLE `cursos_itens`
  MODIFY `idcursos_itens` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `diretor`
--
ALTER TABLE `diretor`
  MODIFY `iddiretor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `iddisciplinas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `operador`
--
ALTER TABLE `operador`
  MODIFY `idoperador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `idprofessor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `idturmas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turnos`
--
ALTER TABLE `turnos`
  MODIFY `idturnos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
