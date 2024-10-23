<div>

    @include("livewire.paiement.liquide")
    @include("livewire.paiement.list")
    @include("livewire.paiement.cinetpay")



</div>

<script>
    // window.addEventListener("showEditModal", event=>{
    //    $("#editModalProp").modal({
    //        "show": true,
    //        "backdrop": "static"
    //    })
    // })
    // window.addEventListener("closeEditModal", event=>{
    //    $("#editModalProp").modal("hide")
    // })

    window.addEventListener("OpenModal", event=>{
       $("#Payementmodal").modal({
           "show": true,
           "backdrop": "static"
       })
       console.log("cinetpay");
    })

    window.addEventListener("closeModal", event=>{
       $("#Payementmodal").modal("hide")
    })
    // console.log("ddd")

</script>



