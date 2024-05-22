<?php

namespace App\Livewire;

use App\Models\post;
use Livewire\Component;

class Homelive extends Component
{
    public $posts;

    public function mount(){
        $this->posts = post::all();
    }
    public function render()
    {
        return view('livewire.homelive');
    }
}
