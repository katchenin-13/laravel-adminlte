{{-- <div>
    {{-- The whole world belongs to you. --
</div> --}}
<div >
    @if($currentpage = PAGELIST)
    @include('livewire.commune.liste')
    @endif

    @if($currentpage = PAGECREATEFORM)
    @include('livewire.commune.create')
    @endif

    @if($currentpage = PAGEEDITFORM)
    @include('livewire.commune.edit')
    @endif



</div>
{{--  --}}