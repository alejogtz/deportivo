<?php

/**
 * @author Alekhius
 * version 1.1
 */
namespace App\Http\Controllers\partidos;

use App\Http\Models\MPartido;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

/**
 * Esta clase provee de un mecanismo automatico
 * que registra los partidos desde octavos hasta finales
 * De manera automatica
 * 
 * En cada actualizacion de partido jugado que se realiza, se le pasa el id del torneo a esta clase
 * que revisa si ya se deben generar sus partidos
 * 
 * ie.
 * file:  ControladorPartido.php
 * // Code para actualizar el partido de No-jugado a Jugado
 * 
 * // then
 * controler->revisarPartidosClasificatoria($id_torneo);
 * 
 * 
 */
class ControladorEtapaClasificatoria extends Controller
{

    public function revisarPartidosClasificatoria($torneo_id)
    {
        #$numero_equipos = numeroEquiposEnTorneo($torneo_id);

        $haJugadoTodosPartidos = $this->todosPartidosJugados($torneo_id);
        #if ($numero_equipos < 25) $haJugado8vos = true; else
        $haJugado8vos = $this->octavosJugados($torneo_id);
        $haJugado4tos = $this->cuartosJugados($torneo_id);
        $haJugadoSemi = $this->semifinalesJugados($torneo_id);
        $haJugadoFinales = $this->finalesJugados($torneo_id);

        if ($haJugadoTodosPartidos && $haJugado8vos && $haJugado4tos  && $haJugadoSemi &&  $haJugadoFinales) {
            // Nothing
        } else if ($haJugadoTodosPartidos && $haJugado8vos && $haJugado4tos  && $haJugadoSemi) {
            // Inserta dos partidos de Finales

            // Esta consulta debe retornar 2 equipos         
            $equiposFinales = DB::table('tabla_8421')
                ->where([['id_torneo', '=', $torneo_id], ['tipo_fase', '=', 'Semifinales']])
                ->take(2)->get(); // Selecciona los 2 partidos            
            # Ida
            MPartido::create(
                [
                    'id_torneo' => $torneo_id,
                    'tipo_fase' => 'Finales',
                    'numero_fase' => 1,  //1 -> corresponde a la IDA
                    'equipo_local' => $equiposFinales[1]->attributes['id_equipo'],
                    'equipo_visitante' => $equiposFinales[0]->attributes['id_equipo']
                ]
            );
            #Vuelta
            MPartido::create([
                    'id_torneo' => $torneo_id,
                    'tipo_fase' => 'Finales',
                    'numero_fase' => 2,  //1 -> corresponde a la VUELTA
                    'equipo_local' => $equiposFinales[0]->attributes['id_equipo'],
                        'equipo_visitante' => $equiposFinales[1]->attributes['id_equipo']
                ]
            );
        
        } else if ($haJugadoTodosPartidos && $haJugado8vos && $haJugado4tos) {
            // Insertar 4 partidos    de SEMIFINALES
            // Esta consulta debe retornar 4 equipos         
            $equiposSemi  = DB::table('tabla_8421')
                ->where([['id_torneo', '=', $torneo_id], ['tipo_fase', '=', 'Cuartos']])
                ->take(4)->get(); // Selecciona los 4 partidos

            for ($i = 0; $i < 2; $i++) {
                # Ida
                MPartido::create(
                    [
                        'id_torneo' => $torneo_id,
                        'tipo_fase' => 'Semifinales',
                        'numero_fase' => 1,  //1 -> corresponde a la IDA
                        'equipo_local' => $equiposSemi[i]->attributes['id_equipo'],
                        'equipo_visitante' => $equiposSemi[3-i]->attributes['id_equipo']
                    ]
                );
                #Vuelta
                MPartido::create(
                    [
                        'id_torneo' => $torneo_id,
                        'tipo_fase' => 'Semifinales',
                        'numero_fase' => 2,          // 2 -> corresponde a la VUELTA
                        'equipo_local' => $equiposSemi[3-i]->attributes['id_equipo'],
                        'equipo_visitante' => $equiposSemi[i]->attributes['id_equipo']
                    ]
                );
            }
        } else if ($haJugadoTodosPartidos && $haJugado8vos) {
            // Insertar 8 partidos    de CUARTOS

            // Esta consulta debe retornar 8 equipos que clasifiquen a Cuartos
            $equipos4tos = DB::table('tabla_8421')
                ->where([['id_torneo', '=', $torneo_id], ['tipo_fase', '=', 'Octavos']])
                ->take(8)->get()->all();

            for ($i = 0; $i < 4; $i++) {
                # Ida
                MPartido::create(
                    [
                        'id_torneo' => $torneo_id,
                        'tipo_fase' => 'Cuartos',
                        'numero_fase' => 1,  //1 -> corresponde a la IDA
                        'equipo_local' => $equipos4tos[i]->attributes['id_equipo'],
                        'equipo_visitante' => $equipos4tos[7-i]->attributes['id_equipo']
                    ]
                );
                #Vuelta
                MPartido::create(
                    [
                        'id_torneo' => $torneo_id,
                        'tipo_fase' => 'Cuartos',
                        'numero_fase' => 2,          // 2 -> corresponde a la VUELTA
                        'equipo_local' => $equipos4tos[7-i]->attributes['id_equipo'],
                        'equipo_visitante' => $equipos4tos[i]->attributes['id_equipo']
                    ]
                );
            }
        } else if ($haJugadoTodosPartidos) {
            // Esto regresa un Array. No Collection ;-)
            $equipos_clasificados =  DB::select("select t.id_equipo as equipo_id,t.pts,t.pj,t.v,t.e,t.d,t.gf,t.gc,t.dif 
                from (select * from torneo(?) ) as t order by t.pts desc limit 16 ", array($torneo_id));

            // desde 0 hasta menor 8 partidos, 1 de ida 1 de vuelta
            for ($i = 0; $i < 8; $i++) {
                # Ida
                MPartido::create([
                    'id_torneo' => $torneo_id,
                    'tipo_fase' => 'Octavos',
                    'numero_fase' => 1,  //1 -> corresponde a la IDA
                    'equipo_local' => $equipos_clasificados[i]->attributes['equipo_id'], // El primero
                    'equipo_visitante' => $equipos_clasificados[15 - i]->attributes['equipo_id'] // El ultimo
                ]); 

                #Vuelta
                MPartido::create([
                    'id_torneo' => $torneo_id,
                    'tipo_fase' => 'Octavos',
                    'numero_fase' => 1,  //1 -> corresponde a la IDA
                    'equipo_local' => $equipos_clasificados[15 - i]->attributes['equipo_id'], // El Ultimo
                    'equipo_visitante' => $equipos_clasificados[i]->attributes['equipo_id']// El primero 
                ]); // El ultimo
            }
        }
    }

    public function todosPartidosJugados($torneo_id)
    {
        // Comprueba si hay partidos
        $partidosRegistrados =
            MPartido::where([['id_torneo', '=', $torneo_id], ['tipo_fase', '=', 'Regular']])->get()->count();

        $partidosSinJugar =
            MPartido::where([
                ['id_torneo', '=', $torneo_id], ['tipo_fase', '=', "Regular"],
                ['estatus_partido', '=', '0']
            ])->get(); // 0 significa NO_JUGADO

        return $partidosRegistrados > 0 && $partidosSinJugar->isEmpty();
    }

    public function octavosJugados($torneo_id)
    {
        $partidosJugados = MPartido::where([
            ['id_torneo', '=', $torneo_id],
            ['tipo_fase', '=', "Octavos"],
            ['estatus_partido', '=', '1']  // 1 QUIERE DECIR ***JUGADO****
        ])->get()->count();

        // 8 de ida, 8 de vuelta
        return $partidosJugados === 16;
    }

    public function cuartosJugados($torneo_id)
    {
        $partidosJugados = MPartido::where([
            ['id_torneo', '=', $torneo_id],
            ['tipo_fase', '=', "Cuartos"],
            ['estatus_partido', '=', '1']  // 1 QUIERE DECIR ***JUGADO****
        ])->get()->count();

        // 4 de ida, 4 de vuelta
        return $partidosJugados === 8;
    }

    public function semifinalesJugados($torneo_id)
    {

        $partidosJugados = MPartido::where([
            ['id_torneo', '=', $torneo_id],
            ['tipo_fase', '=', "Semifinales"],
            ['estatus_partido', '=', '1']  // 1 QUIERE DECIR ***JUGADO****
        ])->get()->count();

        // 2 de ida, 2 de vuelta
        return $partidosJugados === 4;
    }

    public function finalesJugados($torneo_id)
    {

        $partidosJugados = MPartido::where([
            ['id_torneo', '=', $torneo_id],
            ['tipo_fase', '=', "Finales"],
            ['estatus_partido', '=', '1']  // 1 QUIERE DECIR ***JUGADO****
        ])->get()->count();

        // 1 de ida, 1 de vuelta
        return $partidosJugados == 2;
    }
}
