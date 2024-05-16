<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class Jadwal extends Component
{
    
    public $jadwal;
    public $next_waktu;
    public $next_nama;
    public $w_skrg;
    
    public function mount()
    {
        $this->fetch_jadwal();
        $this->hitung();
    }
    
    public function fetch_jadwal()
    {
        $response = Http::get('https://api.myquran.com/v2/sholat/jadwal/2009/' . now()->format('Y-m-d'));
        $data = $response->json();
        $this->jadwal = $data['data']['jadwal'];
    }
    
    public function hitung()
    {
        $skrg = now();
        $jadwal = [
            'imsak' => $this->jadwal['imsak'],
            'subuh' => $this->jadwal['subuh'],
            'terbit' => $this->jadwal['terbit'],
            'dhuha' => $this->jadwal['dhuha'],
            'dzuhur' => $this->jadwal['dzuhur'],
            'ashar' => $this->jadwal['ashar'],
            'maghrib' => $this->jadwal['maghrib'],
            'isya' => $this->jadwal['isya'],
        ];
    
        foreach ($jadwal as $nama => $waktu) {
            $waktu_sholat = Carbon::parse($this->jadwal['date'] . ' ' . $waktu);
            if ($waktu_sholat->greaterThan($skrg)) {
                $this->next_waktu = $waktu_sholat->timestamp;
                break;
            }
        }
    
        if (!isset($this->next_waktu)) {
            $this->fetch_next_jadwal();
        }
    }
    
    public function fetch_next_jadwal()
    {
        $nextDay = now()->addDay()->format('Y-m-d');
        $response = Http::get('https://api.myquran.com/v2/sholat/jadwal/2009/' . $nextDay);
        $data = $response->json();
        $this->jadwal = $data['data']['jadwal'];
        $this->hitung();
    
        $this->dispatch('upCD', $this->next_waktu, $this->next_nama);
    }
    
    public function render()
    {
        return view('livewire.jadwal');
    }
}
