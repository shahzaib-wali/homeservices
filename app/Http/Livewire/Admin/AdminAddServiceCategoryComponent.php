<?php

namespace App\Http\Livewire\Admin;

//use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\ServiceCategories;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name,$slug,$image;

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    //livewire auto call function to validate runtime
    public function updated($fields){
        $this->validateOnly($fields,[
           'name'=>'required|min:05',
           'slug'=>'required',
           'image'=>'required|mimes:jpeg,png',
        ]);
    }

    public function createCategory(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'image'=>'required|mimes:jpeg,png',
        ]);

            $cat = new ServiceCategories();
            $cat->name = $this->name;
            $cat->slug = $this->slug;
            $imagename = Carbon::now()->timestamp.'.'.$this->image->extension();
            $this->image->storeAs('categories',$imagename);
            $cat->image = $imagename;
            $cat->save();
            session()->flash('msg','Category added successfully');

            $this->name = '';
            $this->slug = '';

    }



    public function render()
    {
        return view('livewire.admin.admin-add-service-category-component')
            ->layout('layouts.base');
    }
}
