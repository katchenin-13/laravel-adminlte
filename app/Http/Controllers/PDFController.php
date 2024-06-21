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

        $pdf = PDF::loadView('livewire.bordereau.index', $data)
        ->setPaper('A4','portrait')
        ->setOptions([
            'margin-top'=>0,
            'margin-right'=>0,
            'margin-bottom'=>0,
            'margin-left'=>0
        ]);
        return $pdf->download('Bordereau.pdf');
    }
}
