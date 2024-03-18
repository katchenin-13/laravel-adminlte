<div>

    @include("livewire.tarification.editProp")

    @include("livewire.tarification.addProp")

    @include("livewire.tarification.list")


</div>


<script>

    window.addEventListener("showModal", event=>{
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

</script>

