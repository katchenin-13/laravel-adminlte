<div>

    @include("livewire.vehicule.editProp")

    @include("livewire.vehicule.addProp")

    @include("livewire.vehicule.list")

    @include("livewire.vehicule.deletProp")

    @include("livewire.vehicule.readProd")


</div>

<script>
    //create

    window.addEventListener("showModal", event=>{
       $("#modalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeModal", event=>{
       $("#modalProp").modal("hide")
    })

    //edit
    window.addEventListener("showEditModal", event=>{
       $("#editModalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeEditModal", event=>{
       $("#editModalProp").modal("hide")
    })

    //show

    window.addEventListener("readModal", event=>{
       $("#readmodalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closereadModal", event=>{
       $("#readmodalProp").modal("hide")
    })

    //delete
    window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
            //console.log('soro');
            })
            window.addEventListener('vehiculeDeleted', function () {
            console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
        });


</script>

