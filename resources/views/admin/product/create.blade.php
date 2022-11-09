@extends('layouts.admin')

@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue h4">Add Product</h4>
                <p></p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="pull-right">
                <a href="{{ url('admin/product/') }}" class="btn btn-danger btn-sm scroll-click" rel="content-y"
                   role="button" aria-expanded="true"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-blue active" data-toggle="tab" href="#home" role="tab"
                           aria-selected="false">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#seotag" role="tab"
                           aria-selected="true">SEO Tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#details" role="tab"
                           aria-selected="false">Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-blue" data-toggle="tab" href="#image" role="tab"
                           aria-selected="false">Product Image</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="home" role="tabpanel">
                        <div class="pd-20">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Category</label>
                                <div class="col-sm-12 col-md-10">
                                    <select name="category_id" class="custom-select col-12">
                                        <option selected="">Choose...</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Product Name</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="name" class="form-control" type="text">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Small Description (500 Word)</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="small_description" class="form-control"></textarea>
                                    @error('small_description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="description" class="form-control"></textarea>
                                    @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade " id="seotag" role="tabpanel">
                        <div class="pd-20">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Meta Title</label>
                                <div class="col-sm-12 col-md-10">
                                    <input name="meta_title" class="form-control" type="text">
                                    @error('meta_title')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Meta Keyword</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="meta_keyword" class="form-control"></textarea>
                                    @error('meta_keyword')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-2 col-form-label">Meta Description</label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="meta_description" class="form-control"></textarea>
                                    @error('meta_description')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="details" role="tabpanel">
                        <div class="pd-20">
                            <div class="row">
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Original Price</label>
                                        <input name="original_price" type="number" class="form-control">
                                        @error('original_price')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Selling Price</label>
                                        <input name="selling_price" type="number" class="form-control">
                                        @error('selling_price')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input name="quantity" type="number" class="form-control">
                                        @error('quantity')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="weight-600">Trending</label>
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input name="trending" type="checkbox" class="custom-control-input"
                                                           id="customCheck1-1">
                                                    <label class="custom-control-label" for="customCheck1-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <label class="weight-600">Status</label>
                                                <div class="custom-control custom-checkbox mb-5">
                                                    <input name="status" type="checkbox" class="custom-control-input"
                                                           id="customCheck1-1" checked>
                                                    <label class="custom-control-label" for="customCheck1-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="image" role="tabpanel">
                        <div class="pd-20">
                            <div class="form-group">
                                <label>Images</label>
                                <input name="image[]" type="file" multiple
                                       class="form-control-file form-control height-auto">
                                @error('image')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
