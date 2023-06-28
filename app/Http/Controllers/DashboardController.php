<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ejemplo de uso
        // $anio_actual = date('Y');
        // $fechas_descanso = $this->obtenerDescansosObligatorios($anio_actual);
        
        // foreach ($fechas_descanso as $fecha) {
        //     $fechas[] = date('Y-m-d', $fecha) . "\n";
        // }

        // dd($fechas);
        
        return view('dashboard');
    }

    function obtenerDescansosObligatorios($anio) {
        // Obtener la fecha de Año Nuevo (1 de enero)
        $anio_nuevo = strtotime($anio . '-01-01');
        
        // Obtener la fecha del Día de la Constitución (5 de febrero)
        $dia_constitucion = strtotime($anio . '-02-05');
        
        // Obtener la fecha del Natalicio de Benito Juárez (21 de marzo)
        $natalicio_benito_juarez = strtotime($anio . '-03-21');
        
        // Obtener la fecha del Viernes Santo (varía según el año)
        // $viernes_santo = $this->calcularViernesSanto(2025);
        
        // Obtener la fecha del Día del Trabajo (1 de mayo)
        $dia_trabajo = strtotime($anio . '-05-01');
        
        // Obtener la fecha de la Batalla de Puebla (5 de mayo)
        $batalla_puebla = strtotime($anio . '-05-05');
        
        // Obtener la fecha de la Independencia de México (16 de septiembre)
        $independencia_mexico = strtotime($anio . '-09-16');
        
        // Obtener la fecha del Día de la Revolución Mexicana (20 de noviembre)
        $dia_revolucion = strtotime($anio . '-11-20');
        
        // Obtener la fecha de la Inmaculada Concepción (12 de diciembre)
        $inmaculada_concepcion = strtotime($anio . '-12-12');
        
        // Obtener la fecha de Navidad (25 de diciembre)
        $navidad = strtotime($anio . '-12-25');
        
        // Retornar las fechas de descanso obligatorias como un arreglo ordenado
        $descansos_obligatorios = array(
            $anio_nuevo,
            $dia_constitucion,
            $natalicio_benito_juarez,
            // $viernes_santo,
            $dia_trabajo,
            $batalla_puebla,
            $independencia_mexico,
            $dia_revolucion,
            $inmaculada_concepcion,
            $navidad
        );
        
        sort($descansos_obligatorios);
        
        return $descansos_obligatorios;
    }
    
    function calcularViernesSanto($anio) {
        // Algoritmo para calcular la fecha del Viernes Santo (basado en el método de Butcher)
        $a = $anio % 19;
        $b = (int)($anio / 100);
        $c = $anio % 100;
        $d = (int)($b / 4);
        $e = $b % 4;
        $f = (int)(($b + 8) / 25);
        $g = (int)(($b - $f + 1) / 3);
        $h = (19 * $a + $b - $d - $g + 15) % 30;
        $i = (int)($c / 4);
        $k = $c % 4;
        $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
        $m = (int)(($a + 11 * $h + 22 * $l) / 451);
        $mes = (int)(($h + $l - 7 * $m + 112) / 31);
        $dia = (($h + $l - 7 * $m + 112) % 31) + 1;
    
        return strtotime($anio . '-' . $mes . '-' . $dia);
    }    
}
