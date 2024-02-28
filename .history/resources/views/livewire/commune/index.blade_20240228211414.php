<div>

    @include("livewire.commune.editProp")

    @include("livewire.commune.addProp")

    @include("livewire.commune.list")


</div>

<script>
    window.addEventListener("showEditForm",function(e){
        Swal.fire({
            title: "Edition d'un commune",
            input: 'text',
            inputValue: e.detail.commune.nom ,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText:'Modifier <i class="fa fa-check"></i>',
            cancelButtonText:'Annuler <i class="fa fa-times"></i>',
            inputValidator: (value) => {
                if (!value) {
                return 'Champ obligatoire'
                }

                @this.updateCommune(e.detail.commune.id, value)
            }
        })
    })
</script>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
                timer: 5000
                }
            )
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
       Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data.commune_){
                @this.deleteCommune(event.detail.message.data.type_article_id)
            }

            if(event.detail.message.data.propriete_id){
                @this.deleteProp(event.detail.message.data.propriete_id)
            }
        }
        })
    })

</script>

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

</script>