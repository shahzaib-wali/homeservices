<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategories;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name,$slug,$image,$newimage,$cid;

    public function mount($cid){
        $cat = ServiceCategories::find($cid);
        $this->cid = $cat->id;
        $this->name = $cat->name;
        $this->slug = $cat->slug;
        $this->image = $cat->image;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name,'-');
    }

    public function update($fields){
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
        ]);

        if($this->newimage){
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }

    }

    public function updateservicecategory(){
        $this->validate([
           'name' => 'required',
           'slug' => 'required',
        ]);

        if($this->newimage){
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png',
            ]);
        }

        $cat = ServiceCategories::find($this->cid);
        $cat->name = $this->name;
        $cat->slug = $this->slug;
        if($this->newimage){
            $imgname = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('categories',$imgname);
            $cat->image = $imgname;
        }

        $cat->save();
        session()->flash('msg','update successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-service-category-component')->layout('layouts.base');
    }
}
