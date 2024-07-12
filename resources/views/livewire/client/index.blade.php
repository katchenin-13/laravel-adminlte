<div>

    @include("livewire.client.editProp")

    @include("livewire.client.addProp")

    @include("livewire.client.list")

    @include("livewire.client.deletProp")

    @include("livewire.client.readProd")


</div>

<script>
//create
    window.addEventListener("ModalCreate", event=>{
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
            window.addEventListener('clientDeleted', function () {
            // console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
        });

</script>

