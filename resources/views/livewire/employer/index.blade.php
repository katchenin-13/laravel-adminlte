<div>

    @include("livewire.employer.edit")

    @include("livewire.employer.add")

    @include("livewire.employer.list")

    @include("livewire.employer.read")

    @include("livewire.employer.delet")


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
        window.addEventListener("closeUserModal", event=>{
            $("#readmodalProp").modal("hide")
        })

 //delet
 window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
        })
        window.addEventListener('employerDeleted', function () {
            $('#DelectetModalProp').modal('hide');
        });

</script>

