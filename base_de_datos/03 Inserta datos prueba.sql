set datestyle to sql,dmy;

insert into directort (
	nombre,
	apellido_p,
	apellido_m) 
values(
	'Alejo', 
	'Gutierrez', 
	'Reyes'
);

insert into equipo (
	id_director,
	nombre,
	fecha_inscripcion,
	lugar_procedencia
)values(
	1,
	'Atletico San Pancho',
	'01-05-2019',
	'Atzompa'
);

insert into jugador (
	id_equipo,
	nombre,
	apellido_p,
	apellido_m,
	no_playera,
	estatura,
	posicion,
	fecha_nac,
	foto
) values (
	1,
	'Carlos',
	'Lopez',
	'Rodriguez',
	12,
	173,
	'Deleantero',
	'18-02-1996',
	'/img/jugadores/carlos_lopez_rodriguez_12_1.jpg'
);

insert into torneo(
	nombre,
	categoria,
	fecha_inaguracion,
	fecha_termino
) values (
	'Apertura verano 2019',
	'Ponys',
	'01-05-2019',
	'01-05-2020'
);

insert into fase(
	id_torneo,
	nombre_fase,
	fecha_inicio,
	fecha_termin
) values (
	1,
	'Jornada 1',
	'01-05-2019',
	'01-12-2019'
);

INSERT INTO partido(
	if_fase, 
	lugar, 
	hora, 
	fecha, 
	equipo_local, 
	equipo_visitante, 
	estatus_partido
) VALUES (
	1,
	'Pochutla',
	'15:00',
	'01-05-2019',
	1,
	1,
	'false'
);

