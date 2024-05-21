<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Keuangan extends Component
{
    public $kas_id, $tanggal, $jenis, $keterangan, $sisa_saldo, $update = false, $add = false;

    #[On('updated')]
    public function dataUpdated()
    {

    }
    protected $rules = [
        'tanggal',
        'jenis',
        'keterangan',
        'sisa_saldo'
    ];
    public function resetFields() {
        $this->tanggal = '';
        $this->keterangan = '';
        $this->sisa_saldo = '';
    }
    public function create() {
        $this->resetFields();
        $this->add = true;
        $this->update = false;
    }
    public function store() {
        try {
            \App\Models\keuangan::create([
                'tanggal' => $this->tanggal,
                'jenis' => $this->jenis,
                'keterangan' => $this->keterangan,
                'sisa_saldo' => $this->sisa_saldo,
            ]);

            session()->flash('success', 'Data telah Dibuat!');
            $this->resetFields();
            $this->add = false;
            $this->dispatch('updated');
        } catch (\Exception $ex) {
            session()->flash('error', 'Terjadi Error!');
        }
    }
    public function edit($id) {
        try {
            $kas_terpilih = \App\Models\keuangan::findOrFail($id);
            if (!$kas_terpilih) {
                session()->flash('error', 'Kas yang dipilih, datanya tidak ada');
            } else {
                $this->tanggal = $kas_terpilih->tanggal;
                $this->keterangan = $kas_terpilih->keterangan;
                $this->jenis = $kas_terpilih->jenis;
                $this->sisa_saldo = $kas_terpilih->sisa_saldo;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Terjadi Error!');
        }
    }
    public function update() {
        try {
            \App\Models\keuangan::whereId($this->kas_id)->update([
                'tanggal' => $this->tanggal,
                'jenis' => $this->jenis,
                'keterangan' => $this->keterangan,
                'sisa_saldo' => $this->sisa_saldo,
            ]);
        } catch (\Exception $ex) {
            session()->flash('error', 'Terjadi Error!');
        }
    }
    public function cancel() {
        $this->add = false;
        $this->update = false;
        $this->resetFields();
    }
    public function destroy($id) {
        try {
            \App\Models\keuangan::find($id)->delete();
            session()->flash('success', 'Data Telah dihapus');
        } catch (\Exception $ex) {
            session()->flash('error', 'Terjadi Error!');
        }
    }
    public function render() {
        $kas = \App\Models\keuangan::all();
        return view('livewire.keuangan.keuangan', compact('kas'));
    }
}
