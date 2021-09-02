<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Add Service Categories</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Add Service Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    <a href="{{route('admin.service_categories')}}" class=" btn btn-primary float-right col-md-offset-10">All Service Category</a>
                    <div class="row portfolioContainer">
                        <div class="col-xs-12 col-sm-3 shadow p-50 mb-5 bg-gray rounded col-md-6 profile1">

                            <form class="form-horizontal" wire:submit.prevent="createCategory">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" wire:model="name" wire:keyup="generateSlug" name="name">
                                    @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" class="form-control" wire:model="slug" name="slug">
                                    @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="file" class="form-control" name="image" wire:model="image">
                                    @error('image')<p class="text-danger">{{$message}}</p>@enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success form-control" >Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            @if(Session::has('msg'))
                                <span class="alert alert-success">{{Session('msg')}}</span>
                            @endif
                            @if($image)
                                <img src="{{$image->temporaryUrl()}}" width="30%" class="thumbnail pull-right">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>