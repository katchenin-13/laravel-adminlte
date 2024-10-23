<div>

    @include("livewire.colis.editProp")

    @include("livewire.colis.addProp")

    @include("livewire.colis.list")

   @include("livewire.colis.read")

    @include("livewire.colis.deletProp")


</div>

<script>

//add
    window.addEventListener("ModalCreate", event=>{
       $("#modalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    // window.addEventListener("closeModal", event=>{
    //    $("#modalProp").modal("hide")
    // })

//edit

    window.addEventListener("showEditModal", event=>{
       $("#editModalProp").modal({
           "show": true,
           "backdrop": "static"
       })
       console.log('bonjours')
    })
    // window.addEventListener("closeEditModal", event=>{
    //    $("#editModalProp").modal("hide")
    // })


    //eyes
    window.addEventListener("ReadModal", event=>{
        $("#eyesmodal").modal({
            "show": true,
            "backdrop": "static"
        })
        console.log('bonjour');
        })
        // window.addEventListener("closereadModal", event=>{
        // $("#eyesmodal").modal("hide")
        // })



    ///
    window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
            //console.log('soro');
            })
         window.addEventListener("colisDeleted", event=>{
          $("#DelectetModalProp").modal("hide")
        })

        //delet

</script>

