@if ($request->user()->can('modifier')){
    <div>

            @include("livewire.livraison.editProp")

            @include("livewire.livraison.addProp")

            @include("livewire.livraison.list")

            @include("livewire.livraison.deletProp")

            @include("livewire.livraison.readProd")


        </div>

        <script>

        //create
        window.addEventListener("ReadModal", event=>{
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

            //reade

        ////gdgd
            window.addEventListener("CreateModal", event=>{
                $("#createProp").modal({
                    "show": true,
                    "backdrop": "static"
                })
                })
                window.addEventListener("closeModal", event=>{
                $("#createProp").modal("hide")
                })
            //delete

            window.addEventListener("showDeleteModal", event=>{
                    $("#DelectetModalProp").modal({
                        "show": true,
                        "backdrop": "static"
                    })
                    //console.log('soro');
                    })
                    window.addEventListener('communeDeleted', function () {
                    console.log('fermerture')
                    $('#DelectetModalProp').modal('hide');
                });


        </script>

    }
