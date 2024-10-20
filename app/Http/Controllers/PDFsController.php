
<?php


use Carbon\Carbon;
use App\Models\Client;
use Barryvdh\DomPDF\PDF;
use App\Models\Livraison;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PDFsController extends Controller
{
    public function generatePDF($clientId)
    {

        $clients = Client::findOrFail($clientId);
        $currenthMonth = Carbon::now()->month;
        $livraisons = Livraison::where('client_id','$clientId')->whereMonth('created_at',$currenthMonth)->get();
        $data = [
            'clients' => $clients,
            'livraisons' => $livraisons

        ];

        $pdf = PDF::loadView('livewire.facture.index', $data)
        ->setPaper('A4','portrait')
        ->setOption([
            'margin-top'=>0,
            'margin-right'=>0,
            'margin-bottom'=>0,
            'margin-left'=>0
        ]);
        return $pdf->download('facture.pdf');
    }
}

