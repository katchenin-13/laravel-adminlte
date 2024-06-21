<div>

    @include("livewire.colis.editProp")

    @include("livewire.colis.addProp")

    @include("livewire.colis.list")


</div>

<script>

//add
    window.addEventListener("ModalCreate", event=>{
       $("#modalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeModal", event=>{
       $("#modalProp").modal("hide")
    })



    window.addEventListener("showEditModal", event=>{
       $("#editModalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeEditModal", event=>{
       $("#editModalProp").modal("hide")
    })


//delet
    window.addEventListener("showDeleteModal", event=>{
       $("#DelectetModalProp").modal({
           "show": true,
           "backdrop": "static"
       })
       //console.log('soro');
    })
    window.addEventListener("closeDeleteModal", event=>{
       $("#DelectetModalProp").modal("hide")
    })

    //eyes

    window.addEventListener("showDeleteModal", event=>{
       $("#eyesModalProp").modal({
           "show": true,
           "backdrop": "static"
       })
       //console.log('soro');

    })

    //
    window.addEventListener("ReadModal", event=>{
        $("#eyesModalProp").modal({
            "show": true,
            "backdrop": "static"
        })
        console.log('angaman')
    })
        window.addEventListener("closereadModal", event=>{
        $("#eyesModalProp").modal("hide")
    })
    //
    window.addEventListener('colisDeleted', function () {
            //console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
    })

    window.addEventListener("closeDeleteModal", event=>{
       $("#eyesModalProp").modal("hide")
    })

</script>

