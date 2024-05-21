<form>
    <div class="form-group mb-3">
        <label for="">Jenis</label>
        <select wire:model="jenis" id="jenis">
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="">Tanggal</label>
        <input type="date" wire:model="tanggal" id="">
    </div>
    <div>
        <label for="">Sisa Saldo : </label>
        <input type="number" wire:model="sisa_saldo" id="">
    </div>
    <div class="form-group mb-3">
        <label for="categoryName">Deskripsi :</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Pengeluaran untuk bangun masjid" wire:model="keterangan">
        @error('deskripsi') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>