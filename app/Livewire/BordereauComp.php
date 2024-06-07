<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;

class BordereauComp extends Component
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
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'clients-lists.pdf');
    }
    
    public function render()
    {
        return view('livewire.bordereau');
    }
}
