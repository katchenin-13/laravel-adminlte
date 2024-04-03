<div>

    @include("livewire.categorie.editProp")

    @include("livewire.categorie.addProp")

    @include("livewire.categorie.list")

    @include("livewire.categorie.readProd")

    @include("livewire.categorie.deletProp")


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
    window.addEventListener("ReadModal", event=>{
        $("#readmodalProp").modal({
            "show": true,
            "backdrop": "static"
        })
    })
        window.addEventListener("closereadModal", event=>{
        $("#readmodalProp").modal("hide")
    })

 //delet
 window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
            //console.log('soro');
            })
            window.addEventListener('categorieDeleted', function () {
           // console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
        });

</script>

