<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;


class PDFComp extends Component
{
    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome to Funda of Web IT - fundaofwebit.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('pdf.usersPdf', $data);
        return $pdf->download('users-lists.pdf');
    }

    public function render()
    {
        return view('livewire.generate-pdf');
    }
}
