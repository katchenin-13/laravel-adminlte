<div>

    @include("livewire.manuser.editProp")

    @include("livewire.manuser.addProp")

    @include("livewire.manuser.list")

    @include("livewire.manuser.deletProp")

    @include("livewire.manuser.readProd")


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
            window.addEventListener('manuserDeleted', function () {
            console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
        });


</script>

