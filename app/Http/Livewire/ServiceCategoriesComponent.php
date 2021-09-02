<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategories;

class ServiceCategoriesComponent extends Component
{
    public function render()
    {
        $categories = ServiceCategories::all();
        return view('livewire.service-categories-component',['categories' => $categories])
            ->layout('layouts.base');
    }
}
