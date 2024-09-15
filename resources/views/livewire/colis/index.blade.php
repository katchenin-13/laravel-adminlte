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
       console.log('bonjours')
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
    })
    // window.addEventListener("closeEditModal", event=>{
    //    $("#editModalProp").modal("hide")
    // })


    //eyes
    window.addEventListener("readModal", event=>{
       $("#eyesmodal").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    // window.addEventListener("closereadModal", event=>{
    //    $("#readmodalProp").modal("hide")
    // })


    ///
    window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
            //console.log('soro');
            })
        //     window.addEventListener('colisDeleted', function () {
        //    // console.log('fermerture')
        //     $('#DelectetModalProp').modal('hide');
        // });

        //delet

</script>

