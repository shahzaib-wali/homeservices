<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;

class SproviderDashboard extends Component
{
    public function render()
    {
        return view('livewire.sprovider.sprovider-dashboard')->layout('layouts.base');
    }
}
