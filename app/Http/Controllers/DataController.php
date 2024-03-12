<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataController extends Controller
{
    public function welcome()
    {
        $data = Metric::orderBy('id', 'asc')->paginate(2);

        return view('welcome', compact('data'));
    }

    public function showData()
    {
        return view('showData');
    }

    public function getPrediction(Request $request)
    {
        /* Mediciones */
        $data = Metric::all();

        $selectedIds = $request->input('selected_ids', []);

        // dd($selectedIds);

        // Validar si se han seleccionado registros
        $firstRecord = Metric::find($selectedIds[0]);
        $secondRecord = Metric::find($selectedIds[1]);
        /* Minutos de Diferencia */
        $hour = $request->hour;

        $recordHour = Carbon::createFromFormat('H:i:s', $firstRecord->measurement_time);

        $requestHour = Carbon::createFromFormat('H:i:s', $hour);

        $minutesDifference = $recordHour->diffInMinutes($requestHour); // Diferencia de Minutos Sobre la Primer Medición

        /* C */
        $rt = $firstRecord->room_temperature;

        $firstDegrees = $firstRecord->liquid_temperature;

        $c = $firstDegrees - $rt; // Valor C

        /* K */
        $secondDegrees = $secondRecord->liquid_temperature;

        $subtraction = $secondDegrees - $rt;

        $firstDifference = Carbon::createFromFormat('H:i:s', $secondRecord->measurement_time);

        $firstMinutesDifference = $recordHour->diffInMinutes($firstDifference);

        $division = 1 / $firstMinutesDifference;

        $k = $division * (log($subtraction / $c));

        /* Predición */
        $multiplication = $k * $minutesDifference;

        $e = exp($multiplication);

        $secondMultiplication = $c * $e;

        $prediction = $rt + $secondMultiplication;

        return view('showData', compact('data', 'hour', 'rt', 'minutesDifference', 'c', 'k', 'prediction'));
    }
}
