create database testvocacional;

use testvocacional;

create table informacion(
    id int auto_increment PRIMARY KEY,
    nombre VARCHAR(50),
    grupo VARCHAR(10),
    nie VARCHAR(15),
    pContaduria int,
    pSalud int,
    pTurismo int,
    pInfra int,
    pSoftware int,
    pLogistica int,
    pGeneral int,
    pAutoconocimiento int,
    pRelaciones int
);

delimiter //
create procedure addInformacion(_nom varchar(50), _grupo varchar(10), _nie varchar(15), _con int, _sal int, _tur int, _inf int, _sof int, _log int, _gen int, _aut int, _rel int)
begin
	insert into informacion(nombre,grupo,nie,pContaduria,pSalud,pTurismo,pInfra,pSoftware, pLogistica, pGeneral, pAutoconocimiento, pRelaciones) values
    (_nom, _grupo, _nie, _con, _sal, _tur, _inf, _sof, _log, _gen, _aut, _rel);
end//
delimiter ;

select * from informacion;

delimiter //
create procedure allInformacion()
begin
	select * from informacion;
end//
delimiter ;

call allInformacion;
