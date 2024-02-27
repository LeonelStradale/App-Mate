<?php

namespace App\Http\Controllers;

use App\Models\Metric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    public function welcome()
    {
        // $data = HTTP::get('http://app.test/PHP-API/getData.php');

        // $dataArray = $data->json();

        $data = Metric::all();

        return view('welcome', compact('data'));
    }
}
