
create table pi_aluno(
	id_aluno int not null primary key auto_increment,
	nome_aluno varchar(64) not null,
	cpf varchar(11) not null,
	telefone VARCHAR(14) not null,
	senha varchar(64) not null,
    id_turma int,
    FOREIGN KEY (id_turma) REFERENCES pi_turma(id_turma)
);

create table pi_prof(
    id_prof int not null primary key auto_increment,
    nome_prof varchar(64) not null,
    cpf varchar(11) not null,
	telefone VARCHAR(14) not null,
    senha varchar(64) not null,
    id_turma int,
    FOREIGN KEY (id_turma) REFERENCES pi_turma(id_turma)
);

create table pi_turma(
    id_turma int not null primary key auto_increment,
    idioma varchar(20),
    data_turma date,  
    hora_turma time
);

create table pi_nota(
    id_nota int not null primary key auto_increment,
    nota_um decimal,
    nota_dois decimal,
    id_aluno int not null,
    id_turma int not null,
    id_prof int not null,
    FOREIGN KEY (id_aluno) REFERENCES pi_aluno(id_aluno),
    FOREIGN KEY (id_turma) REFERENCES pi_turma(id_turma),
    FOREIGN KEY (id_prof) REFERENCES pi_prof(id_prof)
);