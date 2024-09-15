{{-- @extends('layouts.app')

@section('styles')
<style>
    .sdk {
        display: block;
        position: absolute;
        background-position: center;
        text-align: center;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
</style>
@endsection

@section('content')
<div class="modal fade" id="clientLivraisonsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">CinetPay Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="sdk">
                    <button onclick="checkout()">Procéder au paiement</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function checkout() {

        CinetPay.setConfig({
            apikey: '88901292466d751d7609930.84421357', // YOUR APIKEY
            site_id: '5879190', // YOUR SITE_ID
            notify_url: '{{ route("cinetpay.notify") }}', // URL de notification
            mode: 'PRODUCTION'
        });

        CinetPay.getCheckout({
            transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
            amount: tarification_total,
            currency: 'XOF',
            channels: 'ALL',
            description: 'Paiement pour la livraison',
            customer_name: client.nom, // Le nom du client
            customer_email: client.email, // l'email du client
            customer_phone_number: client.telephone, // le téléphone du client
            customer_address: client.zone.nom, // addresse du client
            customer_city: "Abidjan", // La ville du client
            customer_country: "CI", // le code ISO du pays
            customer_state: "3166-1", // le code ISO de l'état
            // customer_zip_code: "225", // code postal
            operator_id: '', // à remplir si nécessaire
            payment_date: new Date().toISOString(), // Date du paiement
        });

        CinetPay.waitResponse(function(data) {
            if (data.status == "REFUSED") {
                alert("Votre paiement a échoué");
                window.location.reload();
            } else if (data.status == "ACCEPTED") {
                alert("Votre paiement a été effectué avec succès");
                window.location.reload();
            }
        });

        CinetPay.onError(function(data) {
            console.log(data);
        });
    }
</script>
@endsection --}}
