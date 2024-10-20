<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use App\Models\Livraison;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class fatureclientmoispdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $client;

    public function __construct(User $client)
    {
        $this->client = $client;
    }

    public function handle(): void
    {
        $currentMonth = Carbon::now()->month;
        $livraisons = Livraison::where('client_id', $this->client->id)
            ->whereMonth('created_at', $currentMonth)
            ->where('statut', 'livrer') // Filtrer par statut livré
            ->get();

        $data = [
            'client' => $this->client,
            'livraisons' => $livraisons,
        ];

        $pdf = PDF::loadView('livewire.bordereau.index', $data)
            ->setPaper('A4', 'portrait');

        Mail::send([], [], function ($message) use ($pdf) {
            $message->to($this->client->email)
                ->subject('Votre facture mensuelle')
                ->attachData($pdf->output(), 'bordereau_' . Carbon::now()->format('F_Y') . '.pdf');
        });
    }
}
