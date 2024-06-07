<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        
        $livraisons = Livraison::get();

        $data = [
            'livraisons' => $livraisons
        ];

        $pdf = PDF::loadView('livewire.bordereau.index', $data);
        return $pdf->download('Bordereau.pdf');
    }
}
