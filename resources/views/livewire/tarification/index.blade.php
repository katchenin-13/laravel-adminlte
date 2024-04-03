<div>

    @include("livewire.tarification.editProp")

    @include("livewire.tarification.addProp")

    @include("livewire.tarification.list")

    @include("livewire.tarification.deletProp")

    @include("livewire.tarification.readProd")

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
//delete
        window.addEventListener("showDeleteModal", event=>{
                    $("#DelectetModalProp").modal({
                        "show": true,
                        "backdrop": "static"
                    })
                    //console.log('soro');
                    })
                    window.addEventListener('tarificationDeleted', function () {
                   // console.log('fermerture')
                    $('#DelectetModalProp').modal('hide');
                });

        </script>

