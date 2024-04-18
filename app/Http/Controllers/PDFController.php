<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $clients = Client::get();

        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'clients' => $clients
        ];

        $pdf = PDF::loadView('pdf.usersPdf', $data);
        return $pdf->download('clients-lists.pdf');
    }
}