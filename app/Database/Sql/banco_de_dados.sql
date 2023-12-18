drop database if exists senhoritaLuxoAcessoriosWeb;

create database if not exists senhoritaLuxoAcessoriosWeb;

use senhoritaLuxoAcessoriosWeb;

#1
CREATE TABLE IF NOT EXISTS Produto (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    codigo VARCHAR(250) NOT NULL,
    nome VARCHAR(150) NOT NULL,
    valorUnitario FLOAT NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME
    );

#2
CREATE TABLE IF NOT EXISTS Arquivo (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   path VARCHAR(250) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    produtoId INT NOT NULL,
    FOREIGN KEY (produtoId)
    REFERENCES Produto (id)
    );

#3
CREATE TABLE IF NOT EXISTS Estoque (
   id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
   quantidade INT NOT NULL,
   valorDeAqisicao FLOAT NOT NULL,
   dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
   deletadoEm DATETIME,
   produtoId INT NOT NULL,
   FOREIGN KEY (produtoId)
    REFERENCES Produto (id)
    );

#4
CREATE TABLE IF NOT EXISTS Cupom (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    codigo VARCHAR(100) NOT NULL,
    podeUsarMaisDeUmaVez BOOLEAN NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dataHoraDaValidade DATETIME NOT NULL,
    deletadoEm DATETIME
    );

#5
CREATE TABLE IF NOT EXISTS ValePresente (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    codigo VARCHAR(100) NOT NULL,
    foiUsado BOOLEAN NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    dataHoraDaValidade DATETIME NOT NULL,
    deletadoEm DATETIME
    );

#6
CREATE TABLE IF NOT EXISTS Email (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    valor VARCHAR(250) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME
    );

#7
CREATE TABLE IF NOT EXISTS Login (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    logins INT NOT NULL,
    senha VARCHAR(250) NOT NULL,
    ultimoAcesso DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    emailId INT NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    FOREIGN KEY (emailId)
    REFERENCES Email (id)
    );

#8
CREATE TABLE IF NOT EXISTS Usuario (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(250) NOT NULL,
    sobrenome VARCHAR(250) NOT NULL,
    nascimento DATETIME NOT NULL,
    cpf VARCHAR(14) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    emailId INT NOT NULL,
    FOREIGN KEY (emailId)
    REFERENCES Email (id)
    );

#9
CREATE TABLE IF NOT EXISTS Telefone (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    ddd VARCHAR(2) NOT NULL,
    numero VARCHAR(11) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    usuarioId INT NOT NULL,
    FOREIGN KEY (usuarioId)
    REFERENCES Usuario (id)
    );

#10
CREATE TABLE IF NOT EXISTS Pedido (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    numero VARCHAR(250) NOT NULL,
    valorTotal FLOAT NOT NULL,
    descontoTotal FLOAT NOT NULL,
    observacao VARCHAR(250) NOT NULL,
    pago BOOLEAN NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    usuarioId INT NOT NULL,
    cupomId INT NOT NULL,
    FOREIGN KEY (usuarioId)
    REFERENCES Usuario (id),
    FOREIGN KEY (cupomId)
    REFERENCES Cupom (id)
    );

#11
CREATE TABLE IF NOT EXISTS ItemDoPedido (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    codigoDoProduto VARCHAR(250) NOT NULL,
    nomeDoProduto VARCHAR(250) NOT NULL,
    valorUnitarioDoProduto FLOAT NOT NULL,
    ordemDoItem INT NOT NULL,
    quantidade INT NOT NULL,
    descontoEmPercentual FLOAT NOT NULL,
    descontoEmValor FLOAT NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    produtoId INT NOT NULL,
    FOREIGN KEY (produtoId)
    REFERENCES Produto (id)
    );

#12
CREATE TABLE IF NOT EXISTS Pais (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME
    );

#13
CREATE TABLE IF NOT EXISTS Regiao (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(250) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME
    );

#14
CREATE TABLE IF NOT EXISTS Estado (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(250) NOT NULL,
    sigla VARCHAR(2) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    paisId INT NOT NULL,
    regiaoId INT NOT NULL,
    deletadoEm DATETIME,
    FOREIGN KEY (regiaoId)
    REFERENCES Regiao (id),
    FOREIGN KEY (paisId)
    REFERENCES Pais (id)
    );

#15
CREATE TABLE IF NOT EXISTS Cidade (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(250) NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    estadoId INT NOT NULL,
    FOREIGN KEY (estadoId)
    REFERENCES Estado (id)
    );

#16
CREATE TABLE IF NOT EXISTS Endereco (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(250),
    logradouro VARCHAR(250) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    complemento VARCHAR(250),
    bairro VARCHAR(250) NOT NULL,
    cep VARCHAR(250) NOT NULL,
    favorito BOOLEAN NOT NULL,
    deletadoEm DATETIME,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    cidadeId INT NOT NULL,
    usuarioId INT NOT NULL,
    FOREIGN KEY (cidadeId)
    REFERENCES Cidade (id),
    FOREIGN KEY (usuarioId)
    REFERENCES Usuario (id)
    );

#17
CREATE TABLE IF NOT EXISTS Newsletter (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    emailId int NOT NULL,
    desejaReceber BOOLEAN NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    FOREIGN KEY (emailId)
    REFERENCES Email (id)
    );

#18
CREATE TABLE IF NOT EXISTS Contato (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    emailId int NOT NULL,
    mensagem VARCHAR(250) NOT NULL,
    foiRespondido BOOLEAN NOT NULL,
    dataHoraDaCriacao DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    deletadoEm DATETIME,
    FOREIGN KEY (emailId)
    REFERENCES Email (id)
);



/*
create table if not exists categoria(
id int primary key auto_increment not null,
descricao varchar(250) not null,
deletadoEm datetime
);

create table if not exists produto_categoria(
produtoId int not null,
categoria_id int not null,
deletadoEm datetime,
foreign key (produtoId) references produto(id),
foreign key (categoria_id) references categoria(id)
);

create table if not exists visualizacao(
id int primary key auto_increment not null,
data_hora datetime not null default current_timestamp, 
produtoId int not null,
usuarioId int not null,
deletadoEm datetime,
foreign key (produtoId) references produto(id),
foreign key (usuarioId) references Usuario(id)
);



create table if not exists avaliacao(
id int primary key auto_increment not null,
nota int not null,
data_hora datetime not null default current_timestamp,
usuarioId int not null,
produtoId int not null,
deletadoEm datetime,
foreign key (usuarioId) references Usuario(id),
foreign key (produtoId) references produto(id)
);

create table if not exists curtida(
id int primary key auto_increment not null,
Usuario_curtiu bool not null,
data_hora datetime not null default current_timestamp,
usuarioId int not null,
produtoId int not null,
deletadoEm datetime,
foreign key (usuarioId) references Usuario(id),
foreign key (produtoId) references produto(id)
);



create table if not exists lista_de_desejos(
id int primary key auto_increment not null,
data_hora_modificacao datetime not null default current_timestamp,
usuarioId int not null,
produtoId int not null,
deletadoEm datetime,
foreign key (usuarioId) references Usuario(id),
foreign key (produtoId) references produto(id)
);

create table if not exists lista_de_desejos_produto(
produtoId int not null,
lista_de_desejos_id int not null,
foreign key (lista_de_desejos_id) references lista_de_desejos(id),
foreign key (produtoId) references produto(id)
);
*/

/*
create table if not exists forma_de_pagamento(
id int primary key auto_increment not null,
nome varchar(150), ##todo unique no campo
deletadoEm datetime
);

create table if not exists recebimento(
id int primary key auto_increment not null,
data_hora datetime not null default current_timestamp,
valor_recebido float not null,
forma_de_pagamento_id int not null,
usuarioId_cliente int not null,
usuarioId_vendedor int not null,
usuarioId_caixa int not null,
pedido_id int not null,
deletadoEm datetime,
foreign key (usuarioId_cliente) references Usuario(id),
foreign key (usuarioId_vendedor) references Usuario(id),
foreign key (usuarioId_caixa) references Usuario(id),
foreign key (pedido_id) references pedido(id),
foreign key (forma_de_pagamento_id) references forma_de_pagamento(id)
);

create table if not exists conta(
id int primary key auto_increment not null,
nome varchar(150),
agencia varchar(100),
conta varchar(100),
deletadoEm datetime
);

create table if not exists despesa(
id int primary key auto_increment not null,
nome varchar(150),
valor float,
data_de_vencimaneto datetime not null default current_timestamp,
multa float,
juros float,
desconto float,
observacao varchar(250),
deletadoEm datetime
);

create table if not exists pagamento(
id int primary key auto_increment not null,
data_hora datetime not null default current_timestamp,
valor_pago float not null,
forma_de_pagamento_id int not null,
usuarioId int not null,
despesa_id int not null,
deletadoEm datetime,
foreign key (usuarioId) references Usuario(id),
foreign key (despesa_id) references despesa(id),
foreign key (forma_de_pagamento_id) references forma_de_pagamento(id)
);


create table if not exists pesoa_fisica(
id int primary key auto_increment not null,
nome_completo varchar(250),
data_de_nascimento datetime not null default current_timestamp,
cpf varchar(11),
deletadoEm datetime
);

create table if not exists pesoa_juridica(
id int primary key auto_increment not null,
nome_fantasia varchar(250),
nome_da_empresa datetime not null default current_timestamp,
cnpj varchar(14),
deletadoEm datetime
);

create table if not exists funcao(
id int primary key auto_increment not null,
descricao varchar(250),
nivel_de_acesso enum('comprar','vender','estocar','administrar','root'),
cpf varchar(11),
deletadoEm datetime
);
*/