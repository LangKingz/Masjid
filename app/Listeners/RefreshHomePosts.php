<?php

namespace App\Listeners;

use App\Events\PostAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Livewire\Component;

class RefreshHomePosts
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostAdded $event)
    {
        // Emit event to Livewire component
        broadcast(new \App\Events\PostAdded($event->post))->toOthers();
    }
}
