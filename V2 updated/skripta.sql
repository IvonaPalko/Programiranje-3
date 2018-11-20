create database p3api;

create table radnomjesto(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
opis varchar(255),
osnovica decimal(18,2) not null,
satnica int not null,
neodredeno boolean not null default false
);

insert into radnomjesto (naziv,osnovica,satnica)
values ('Docent',4100,162);

select * from radnomjesto;