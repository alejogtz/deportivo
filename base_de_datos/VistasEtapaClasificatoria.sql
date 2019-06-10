CREATE OR REPLACE VIEW tabla_8421 AS
select *, case when golesEquipoA>golesEquipoB then equipoA else equipoB end as Ganador from (
	select id_torneo,tipo_fase, equipoA, equipoB,
	sum (golesA) as golesEquipoA,
	sum (golesB) as golesEquipoB
	FROM (
		
		select id_torneo, 
			tipo_fase,
			equipo_local AS equipoA, 
			equipo_visitante AS equipoB,
			goles_local as golesA,
			goles_visitante as golesB
		from partido  -- inner join gol on partido.id_partido = gol.id_partido // se comenta esta linea por la actualizacion que hizo carlos de poner en la tabla partido el numero de goles
		where  numero_fase = 1 -- #La Ida
		union ALL
		select id_torneo, 
			tipo_fase,
			equipo_visitante AS equipoA, 
			equipo_local AS equipoB,
			goles_visitante as golesA,
			goles_local as golesB
		from partido --inner join gol on partido.id_partido = gol.id_partido
		where  numero_fase = 2     ) as sub1 -- #La vuelta
group by id_torneo, tipo_fase, equipoA, equipoB) as sub2;