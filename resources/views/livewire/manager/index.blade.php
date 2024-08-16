<div>

    @include("livewire.manager.edit")

    @include("livewire.manager.add")

    @include("livewire.manager.list")

    @include("livewire.manager.read")

    @include("livewire.manager.delet")


</div>

<script>

//create
window.addEventListener("CreateModal", event=>{
            $("#ShowModalProp").modal({
                "show": true,
                "backdrop": "static"
                })
            })
 window.addEventListener("closeshowModal", event=>{
     $("#ShowModalProp").modal("hide")
     })

    //edit
    window.addEventListener("EditModal", event=>{
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

 //delet
 window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
            //console.log('soro');
            })
            window.addEventListener('ManagerDeleted', function () {
           // console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
        });

</script>

