<div>

    @include("livewire.paiement.liquide")
    @include("livewire.paiement.list")
    @include("livewire.paiement.cinetpay")



</div>

<script>
// create
// document.addEventListener('livewire:load', function () {
//     Livewire.on('openModal', () => {
//         var modal = new bootstrap.Modal(document.getElementById('clientLivraisonsModal'));
//         modal.show();
//        })
//     })
//     window.addEventListener("closeModal", event=>{
//        $("#modalProp").modal("hide")
//     })

    window.addEventListener("openModal", event=>{
       $("#clientLivraisonsModal").modal({
           "show": true,
           "backdrop": "static"
       })
    })

    window.addEventListener("closeModal", event=>{
       $("#clientLivraisonsModal").modal("hide")
    })
    // console.log("ddd")

</script>



