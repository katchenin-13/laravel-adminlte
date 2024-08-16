
    <div>
        @include("livewire.users.deletProp")
        @include("livewire.users.readProd")
        @include("livewire.users.editProp")
        @include("livewire.users.addProp")
        @include("livewire.users.liste")
    </div>

    {{-- Scripts --}}
    <script>
        // Modal de création
        window.addEventListener("CreatModalU", event=>{
            $("#modalProp").modal({
                "show": true,
                "backdrop": "static"
            })
        })
        window.addEventListener("closeModal", event=>{ss
            $("#modalProp").modal("hide")
        })

        // Modal d'édition
        window.addEventListener("EditModal", event=>{
            $("#editModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
        })
        window.addEventListener("closeEditModal", event=>{
            $("#editModalProp").modal("hide")
        })

        // Modal de lecture
        window.addEventListener("readModal", event=>{
            $("#readmodalProp").modal({
                "show": true,
                "backdrop": "static"
            })
        })
        window.addEventListener("closeUserModal", event=>{
            $("#readmodalProp").modal("hide")
        })

        // Modal de suppression
        window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
        })
        window.addEventListener('userDeleted', function () {
            $('#DelectetModalProp').modal('hide');
        });
    </script>
