/*
drop table gol;
drop table tarjeta;
drop table cambio;
drop table partido;
drop table usuario;
drop table torneo;
drop table jugador_equipo;
drop table jugador;
drop table equipo;
drop table directort;
*/


set datestyle to sql,dmy;

create table directort(
	id_director SERIAL primary key,
	nombre varchar (50),
	apellido_p varchar(30),
	apellido_m varchar (30),
	elimnado boolean default false
);

create table equipo(
	id_equipo SERIAL primary key,
	id_director int references directort(id_director),
	nombre varchar (50),
	fecha_inscripcion date,
	lugar_procedencia varchar(50),
	elimnado boolean default false
);

create table jugador(
	id_jugador SERIAL primary key,
	nombre varchar (50),
	apellido_p varchar(30),
	apellido_m varchar (30),
	no_playera int CHECK (no_playera>0),
	estatura numeric CHECK (estatura>0),
	posicion varchar(20),
	fecha_nac date,
	foto text,
	elimnado boolean default false
);


create table jugador_equipo(
	id_equipo int references equipo (id_equipo),
	id_jugador int references jugador(id_jugador)
);

create table torneo(
	id_torneo SERIAL primary key,
	nombre varchar (20),
	categoria varchar(30),
	fecha_inaguracion date,
	fecha_termino date,
	elimnado boolean default false
);


create table partido(
	id_partido SERIAL primary key,
	id_torneo int references torneo(id_torneo),
	tipo_fase varchar(50),  -- Regular|Octavos|Cuartos|Semifinales|Finales
	numero_fase int, 		-- 1|2|3|4|5|6|7|8|9 y si es clasificatoria será null
	lugar varchar(30),
	hora time,
	fecha date,
	equipo_local int references equipo(id_equipo),
	equipo_visitante int references equipo(id_equipo),
	estatus_partido boolean, --- 0 = No Jugado;	1 = Jugado
	ganador	varchar(9), 	  ---- Local | Visitante
	elimnado boolean default false
);

create table gol(
	id_partido int references partido(id_partido),
	id_jugador int,
	minuto int,
	equipo_en_contra int CHECK (equipo_en_contra>0),
	equipo_en_favor_de int CHECK (equipo_en_favor_de >0),
	tipo_anotacion varchar (15),
	elimnado boolean default false
);

create table tarjeta(
	id_partido int references partido(id_partido),
	id_jugador int CHECK (id_jugador>0),
	minuto int,
	id_equipo int CHECK (id_equipo>0),
	tipo varchar(15),
	elimnado boolean default false
);

create table cambio (
	id_partido int references partido(id_partido),
	id_equipo int CHECK (id_equipo>0),
	jugador_entra int CHECK (jugador_entra>0),
	jugador_sale int CHECK (jugador_sale>0),
	minuto int,
	elimnado boolean default false
);


create table usuario(
	id_usuario serial primary key,
	nombre varchar(100),
	contrasenia varchar(100),
	correo varchar(100),
	tipo varchar(20),
	elimnado boolean default false
);

--vista tabla general
/*create table tabla_general(
	id_torneo int references torneo(id_torneo),
	nombre_equipo varchar(50),
	juegos_jugados int,
	juegos_empatados int,
	juegos_perdidos int,
	goles_a_favor int,
	goles_en_contra int,
	diferencia_de_goles int,
	puntos int,
	elimnado boolean default false
);
--vista tabla clasificatoria
create table tabla_clasificatoria(
	id_partido int references partido(id_partido),
	ronda varchar (20),
	id_equipo int CHECK (id_equipo>0),
	elimnado boolean default false
);*/


/*
--YA NO ESTÁ EN EL E-R
create table fase(
	id_fase SERIAL primary key,
	id_torneo int references torneo (id_torneo),
	nombre_fase varchar(30),
	fecha_inicio date,
	fecha_termin date,
	elimnado boolean default false
);
*/