<div wire:ignore.self>
    @if($currentpage = PAGELIST)
    @include('livewire.Commune.list')
    @endif

    @if($currentpage = PAGECREATEFORM)
    @include('livewire.Commune.create')
    @endif

    @if($currentpage = PAGEEDITFORM)
    @include('livewire.Commune.edit')
    @endif



</div>