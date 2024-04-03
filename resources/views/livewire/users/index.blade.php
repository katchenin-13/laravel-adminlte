<div>
    @include("livewire.users.deletProp")

   @include("livewire.users.readProd")

   @include("livewire.users.editProp")

   @include("livewire.users.addProp")

   @include("livewire.users.liste")


</div>

{{-- <script>
   window.addEventListener("showEditForm",function(e){
       Swal.fire({
           title: "Edition d'un user",
           input: 'text',
           inputValue: e.detail.user.nom ,
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText:'Modifier <i class="fa fa-check"></i>',
           cancelButtonText:'Annuler <i class="fa fa-times"></i>',
           inputValidator: (value) => {
               if (!value) {
               return 'Champ obligatoire'
               }

               @this.updateUser(e.detail.user.id, value)
           }
       })
   })
</script> --}}
{{--
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
</script> --}}

{{-- <script>
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
           if(event.detail.message.data.user_id){
               @this.deleteUser(event.detail.message.data.user_id)
           }

       }
       })
   })

</script> --}}

<script>

   window.addEventListener("CreatModalU", event=>{
      $("#modalProp").modal({
          "show": true,
          "backdrop": "static"
      })
   })
   window.addEventListener("closeModal", event=>{
      $("#modalProp").modal("hide")
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

   //delete
   window.addEventListener("showDeleteModal", event=>{
            $("#DelectetModalProp").modal({
                "show": true,
                "backdrop": "static"
            })
            //console.log('soro');
            })
            window.addEventListener('userDeleted', function () {
            //console.log('fermerture')
            $('#DelectetModalProp').modal('hide');
        });


</script>

