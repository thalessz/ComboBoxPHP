create table traficante(
    id integer,
    nome varchar(1024); 
);
create table drogas(
    id integer primary key auto_increment,
    nome varchar(128),
    img varchar(10240),
    traficante integer,
    foreign key(traficante) references traficante(id)
);
insert into traficante (nome) values ("lucão");
insert into traficante (nome) values ("jean");
insert into traficante (nome) values ("rafa");
insert into traficante (nome) values ("wagner");
