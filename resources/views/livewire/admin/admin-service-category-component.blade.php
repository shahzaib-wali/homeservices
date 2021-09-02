<div>
    <div class="section-title-01 honmob">
        <div class="bg_parallax image_02_parallax"></div>
        <div class="opacy_bg_02">
            <div class="container">
                <h1>Service Categories</h1>
                <div class="crumbs">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>/</li>
                        <li>Service Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="content-central">
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container">
                    @if(Session::has('msg'))
                        <span class="mb-4 p-4 alert alert-success">{{Session('msg')}}</span>
                    @endif
                    <a href="{{route('admin.add_service_categories')}}" class=" btn btn-primary float-right col-md-offset-10">Add Service Category</a>
                    <div class="row portfolioContainer">
                        <div class="col-xs-12 col-sm-3 col-md-12 profile1">
                            <table class="table table-responsive table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $cats)
                                </tr>
                                <td>{{$cats->id}}</td>
                                <td><img src="{{asset('images/categories')}}/{{$cats->image}}" width="60"></td>
                                <td>{{$cats->name}}</td>
                                <td>{{$cats->slug}}</td>
                                <td><a href="{{route('admin.edit_service_categories',['cid' => $cats->id])}}">
                                        <i class="fa fa-edit"></i></a> |
                                    <a href="#" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                       wire:click.prevent="deleteServiceCategory({{$cats->id}})">
                                        <i class="fa fa-trash"></i></a>
                                </td>

                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$categories->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>