<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    public function welcome()
    {
        $data = HTTP::get('http://app.test/PHP-API/getData.php');

        $dataArray = $data->json();

        return view('welcome', compact('dataArray'));
    }
}
