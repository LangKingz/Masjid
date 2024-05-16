<div>
    @if($add == true)
        @include('livewire.create')
    @endif
    <div wire:poll class="col-md-12 mb-2">
        {{-- @if(Auth::check()) Fungsi Validasi jika user logged in --}}
            <button wire:click="create()">Tambah</button>
        {{-- @endif --}}
        @foreach($display_text as $dt)
        {{$dt->text}}
        @endforeach
    </div>
</div>
