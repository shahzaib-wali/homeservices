<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategories;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Livewire\withPagination;

class AdminServiceCategoryComponent extends Component
{
//    use withPagination;

    public function deleteServiceCategory($id){
        $cat = ServiceCategories::find($id);
        if($cat->image){
            unlink('images/categories/'.$cat->image);
        }
        $cat->delete();
        Session::flash('msg','Service Category deleted!');
    }

    public function render()
    {
        $categories = ServiceCategories::paginate(5);
        return view('livewire.admin.admin-service-category-component',['categories' => $categories])
            ->layout('layouts.base');
    }
}
