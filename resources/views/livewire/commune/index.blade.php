<div>

    @include("livewire.commune.editProp")

    @include("livewire.commune.addProp")

    @include("livewire.commune.readProd")

    @include("livewire.commune.deletProp")

    @include("livewire.commune.list")


</div>

<script>


 //create

    window.addEventListener("ReadModal", event=>{
       $("#ShowModalProp").modal({
           "show": true,
           "backdrop": "static"
        })
    })
    //    window.addEventListener("closeshowModal", event=>{
    //    $("#ShowModalProp").modal("hide")
    // })

    //edit
    window.addEventListener("EditModal", event=>{
       $("#editModalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    // window.addEventListener("closeEditModal", event=>{
    //    $("#editModalProp").modal("hide")
    // })

    //reade

////gdgd
    window.addEventListener("CreateModal", event=>{
        $("#createProp").modal({
            "show": true,
            "backdrop": "static"
        })
        })
        // window.addEventListener("closeModal", event=>{
        // $("#createProp").modal("hide")
        // })
    //delete

    window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
            //console.log('soro');
            })
        //     window.addEventListener('communeDeleted', function () {
        //     console.log('fermerture')
        //     $('#DelectetModalProp').modal('hide');
        // });

    // function hideMessageDiv() {
    //    setTimeout(function() {
    //    $('.alert-success').fadeOut();
    //  }, 2000);
    // }
    // $(document).ready(function(){
    //     hideMessageDiv();
    // });
</script>

