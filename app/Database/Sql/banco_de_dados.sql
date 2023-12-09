
drop database if exists senhorita_luxo_acessorios_web;

create database if not exists senhorita_luxo_acessorios_web;

use senhorita_luxo_acessorios_web;

################################################################
# INICÍO ENDEREÇO 
################################################################

create table pais
(
id int primary key auto_increment not null,
nome varchar(100) not null,
name varchar(100) not null,
deleted_at datetime
);

create table if not exists regiao(
id int primary key auto_increment not null,
nome varchar(250),
deleted_at datetime
);

create table if not exists estado(
id int primary key auto_increment not null,
nome varchar(250) not null,
sigla varchar(2) not null,
pais_id int not null,
regiao_id int not null,
deleted_at datetime,
foreign key (regiao_id) references regiao(id),
foreign key (pais_id) references pais(id)
);

create table if not exists cidade(
id int primary key auto_increment not null,
nome varchar(250) not null,
estado_id int not null,
deleted_at datetime,
foreign key (estado_id) references estado(id)
);

create table if not exists endereco(
id int primary key auto_increment not null,
nome varchar(250),
logradouro varchar(250) not null,
numero varchar(10) not null,
complemento varchar(250),
bairro varchar(250) not null,
cep varchar(250) not null,
favorito boolean not null,
deleted_at datetime,
cidade_id int not null,
foreign key (cidade_id) references cidade(id)
);
################################################################
# FIM ENDEREÇO 
################################################################


create table if not exists usuario(
id int primary key auto_increment not null,
cadastrado datetime not null default current_timestamp,
ultimo_acesso datetime not null default current_timestamp,
logins int not null,
email varchar(250) not null,
senha varchar(250) not null,
celular varchar(11) not null,
ddd varchar(2) not null,
nome varchar(250) not null,
sobrenome varchar(250) not null,
deleted_at datetime
);

create table if not exists arquivo(
id int primary key auto_increment not null,
criado datetime not null default current_timestamp,
path varchar(250) not null,
deleted_at datetime
);

create table if not exists produto(
id int primary key auto_increment not null,
valor float not null,
nome varchar(150) not null,
codigo varchar(250) not null,
deleted_at datetime
);

create table if not exists arquivo_produto(
arquivo_id int,
produto_id int,
deleted_at datetime,
foreign key (arquivo_id) references arquivo(id),
foreign key (produto_id) references produto(id)
);

create table if not exists estoque(
id int primary key auto_increment not null,
quantidade int not null,
valor_de_aquisicao float not null,
produto_id int not null,
deleted_at datetime,
foreign key (produto_id) references produto(id)
);

create table if not exists item_do_pedido(
id int primary key auto_increment not null,
ordem int not null,
nome varchar(250) not null,
valor_unitario float not null,
codigo varchar(250) not null,
quantidade int not null,
desconto_em_percentual float not null,
desconto_em_valor float not null,
produto_id int not null,
deleted_at datetime,
foreign key (produto_id) references produto(id)
);

create table if not exists pedido(
id int primary key auto_increment not null,
numero varchar(250) not null,
data_hora datetime not null default current_timestamp,
valor_total float not null,
desconto_total float not null,
observacao varchar(250) not null,
pago boolean not null,
usuario_id int not null,
deleted_at datetime,
foreign key (usuario_id) references usuario(id)
);

/*
create table if not exists categoria(
id int primary key auto_increment not null,
descricao varchar(250) not null,
deleted_at datetime
);

create table if not exists produto_categoria(
produto_id int not null,
categoria_id int not null,
deleted_at datetime,
foreign key (produto_id) references produto(id),
foreign key (categoria_id) references categoria(id)
);

create table if not exists visualizacao(
id int primary key auto_increment not null,
data_hora datetime not null default current_timestamp, 
produto_id int not null,
usuario_id int not null,
deleted_at datetime,
foreign key (produto_id) references produto(id),
foreign key (usuario_id) references usuario(id)
);



create table if not exists avaliacao(
id int primary key auto_increment not null,
nota int not null,
data_hora datetime not null default current_timestamp,
usuario_id int not null,
produto_id int not null,
deleted_at datetime,
foreign key (usuario_id) references usuario(id),
foreign key (produto_id) references produto(id)
);

create table if not exists curtida(
id int primary key auto_increment not null,
usuario_curtiu bool not null,
data_hora datetime not null default current_timestamp,
usuario_id int not null,
produto_id int not null,
deleted_at datetime,
foreign key (usuario_id) references usuario(id),
foreign key (produto_id) references produto(id)
);



create table if not exists lista_de_desejos(
id int primary key auto_increment not null,
data_hora_modificacao datetime not null default current_timestamp,
usuario_id int not null,
produto_id int not null,
deleted_at datetime,
foreign key (usuario_id) references usuario(id),
foreign key (produto_id) references produto(id)
);

create table if not exists lista_de_desejos_produto(
produto_id int not null,
lista_de_desejos_id int not null,
foreign key (lista_de_desejos_id) references lista_de_desejos(id),
foreign key (produto_id) references produto(id)
);
*/

/*
create table if not exists forma_de_pagamento(
id int primary key auto_increment not null,
nome varchar(150), ##todo unique no campo
deleted_at datetime
);

create table if not exists recebimento(
id int primary key auto_increment not null,
data_hora datetime not null default current_timestamp,
valor_recebido float not null,
forma_de_pagamento_id int not null,
usuario_id_cliente int not null,
usuario_id_vendedor int not null,
usuario_id_caixa int not null,
pedido_id int not null,
deleted_at datetime,
foreign key (usuario_id_cliente) references usuario(id),
foreign key (usuario_id_vendedor) references usuario(id),
foreign key (usuario_id_caixa) references usuario(id),
foreign key (pedido_id) references pedido(id),
foreign key (forma_de_pagamento_id) references forma_de_pagamento(id)
);

create table if not exists conta(
id int primary key auto_increment not null,
nome varchar(150),
agencia varchar(100),
conta varchar(100),
deleted_at datetime
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
deleted_at datetime
);

create table if not exists pagamento(
id int primary key auto_increment not null,
data_hora datetime not null default current_timestamp,
valor_pago float not null,
forma_de_pagamento_id int not null,
usuario_id int not null,
despesa_id int not null,
deleted_at datetime,
foreign key (usuario_id) references usuario(id),
foreign key (despesa_id) references despesa(id),
foreign key (forma_de_pagamento_id) references forma_de_pagamento(id)
);


create table if not exists pesoa_fisica(
id int primary key auto_increment not null,
nome_completo varchar(250),
data_de_nascimento datetime not null default current_timestamp,
cpf varchar(11),
deleted_at datetime
);

create table if not exists pesoa_juridica(
id int primary key auto_increment not null,
nome_fantasia varchar(250),
nome_da_empresa datetime not null default current_timestamp,
cnpj varchar(14),
deleted_at datetime
);

create table if not exists funcao(
id int primary key auto_increment not null,
descricao varchar(250),
nivel_de_acesso enum('comprar','vender','estocar','administrar','root'),
cpf varchar(11),
deleted_at datetime
);
*/