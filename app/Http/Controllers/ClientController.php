<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Client;

class ClientController extends Controller
{
    public function FunctionName() {
        $clients = Client::all(); // Pobierz wszystkich klientow
        return view('clients.index', ['clients' => $clients]);
    }
}
