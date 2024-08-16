<div>

    @include("livewire.coursuser.editProp")

    @include("livewire.coursuser.addProp")

    @include("livewire.coursuser.list")

    @include("livewire.coursuser.deletProp")

    @include("livewire.coursuser.readProd")


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
            window.addEventListener('coursuserDeleted', function () {
            console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
        });


</script>

