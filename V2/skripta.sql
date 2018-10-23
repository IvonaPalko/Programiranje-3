create database v2;
use v2;

CREATE TABLE radnomjesto(
sifra int not null primary key auto_increment,
naziv varchar(50) not null,
opis varchar(255),
osnovica decimal(18,2) not null,
mjesecnasatnica int not null,
neodredeno boolean not null default false
);

INSERT INTO radnomjesto(naziv, osnovica, mjesecnasatnica)
VALUES ('Developer', 4000, 162);

select * from radnomjesto;

INSERT INTO radnomjesto(naziv, osnovica, mjesecnasatnica)
VALUES ('Marketing', 4000, 162);
INSERT INTO radnomjesto(naziv, osnovica, mjesecnasatnica)
VALUES ('SEO', 4000, 162);

select * from radnomjesto;